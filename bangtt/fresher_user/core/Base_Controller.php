<?php
class Base_Controller {
    public function view($controller_name, $view_name, $data = NULL) {
        if ($data != NULL) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
        }
        global $view_path;
        require("$view_path/$controller_name/$view_name.php");
    }
}