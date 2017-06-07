<?php

class Home extends Base_Controller {
    public function index() {
        $this->view("home", "index");
    }

    public function add_user() {
        if (isset($_POST['btnCreate'])) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $username = $_POST['txtUsername'];
            $email = $_POST['txtEmail'];
            $password = $_POST['txtPassword'];
            $select = $_POST['select'];
            if ($select == '1') {
                $status = 1;
            } else {
                $status = 0;
            }
            $dateNow = new DateTime();
            $date_format_date_now = date_format($dateNow, 'Y-m-d H:I:S');
            $user_created_time = $date_format_date_now;
            $user_updated_time = $date_format_date_now;
            $data = array(
                'username'          => $username,
                'pass'              => $password,
                'status'            => $status,
                'user_email'        => $email,
                'user_time_created' => $user_created_time,
                'user_time_updated' => $user_updated_time,
            );
            $user_model = new User_model();

            if ($user_model->insert($data)) {
                $_SESSION['list_user'] = $user_model->get_all_data();
                $this->view("home", "index",$_SESSION['list_user']);
            } else {
                $this->view("home", "add_user");
            }
        } else {
            $this->view("home", "add_user");
        }
    }
}