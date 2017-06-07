<?php

class User_model extends Base_Model {
    protected $table = "user";
    protected $id = "user_id";

    public function check_login($username, $password) {
        $sql = "SELECT * FROM user WHERE username = '$username' AND pass = '$password'";
        $result = $this->conn->query($sql);
        if ($result->num_rows >0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}