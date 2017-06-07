<?php
class Auto_load
{
    public function __construct() {
        global $controller_path,$view_path,$model_path;
        $this->controller_path = $controller_path;
        $this->view_path = $view_path;
        $this->model_path = $model_path;
    }

    public function Init() {
        $controller = isset($_GET['c']) ? $_GET['c'] : "";
        if ($controller != "") {
            if (!file_exists("$this->controller_path/$controller.php")) {
                require("$this->controller_path/404.php");
                return;
            }
            require("$this->controller_path/$controller.php");
            if (!class_exists($controller)) {
                require("$this->controller_path/404.php");
                return;
            }
            $c = new $controller;
            $action = isset($_GET['a']) ? $_GET['a'] : "";
            if (!method_exists($controller, $action)) {
                require("$this->controller_path/404.php");
                return;
            }
            $c->$action();
        }
    }
}