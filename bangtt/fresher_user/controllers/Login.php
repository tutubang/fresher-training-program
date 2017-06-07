<?php

class Login extends Base_Controller {
    public function index() {
        if (isset($_POST['btnLogin'])) {
            $error = array();
            $login_fail = array();
            $username = $_POST['txtUsername'];
            $password = $_POST['txtPassword'];

            $user_model = new User_model();
            if (empty($username)) {
                $error['username'] = "Input your username please!";
            }
            if (empty($password)) {
                $error['password'] = "Input your pass please!";
            }
            $_SESSION['error'] = $error;
            if (!$error) {
                $password = md5($password);
                if ($user_model->check_login($username, $password)) {
                    $data = array(
                        'username' => $username,
                        'password' => $password,
                    );
                    $_SESSION['account'] = $data;
                    $_SESSION['list_user'] = $user_model->get_all_data();
                    $this->view("home", "index", $_SESSION['list_user']);
                } else {
                    $login_fail['account'] = "Account does not exits!";
                    $_SESSION['login_fail'] = $login_fail;
                    $this->view("login", "index");
                }
            } else {
                $this->view("login", "index");
            }
        } else {
            $this->view("login", "index");
        }
    }

    public function logout() {
        if (isset($_SESSION['account'])) {
            unset($_SESSION['account']);
            $this->view("login", "index");
        } else {
            $this->view("login", "index");
        }
    }
}