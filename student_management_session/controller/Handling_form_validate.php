<?php

class Handling_form_validate {
    public function form_validate($id, $name, $email,$file) {
        $error = array();
        //check form validate
        require('Email_validate.php');
        $validate = new Email_Validate();
        if (empty($id)) {
            $error['id'] = "Input your id please!";
        }
        if (empty($name)) {
            $error['name'] = "Input your name please!";
        }
        if (empty($email)) {
            $error['email'] = "Input your email please!";
        } elseif (!$validate->is_email($email)) {
            $error['email'] = "Email invalidate!";
        }

        //$_SESSION['data'] = $data;
        $_SESSION['error'] = $error;
//        require('Student_controller.php');
        $student_controller = new Student_controller();
        //save data
        if (!$error) {
            $student_controller->addStudent($id, $name, $email,$file);
            //header('Location: student_list.php');
        } else {
            echo "There is some error, can't save your data!";
        }
    }
}
