<?php

class Base_Model {
    protected $table;
    protected $conn;
    protected $id;

    public function __construct() {
        $this->conn = new mysqli('localhost', 'root', '', 'fresher_user');
        //check connect
        if ($this->conn->connect_error) {
            die("Connection fail:" . $this->conn->connect_error);
        }
    }

    public function insert($data = array()) {
        $columns = implode(",", array_keys($data));
        $escaped_values = array_values($data);
        foreach ($escaped_values as $k => $v) $escaped_values[$k] = "'" . str_replace("'", "", $v) . "'";
        $values = implode(", ", $escaped_values);
        $sql = "INSERT INTO $this->table($columns) VALUE ($values)";

        if ($this->conn->query($sql)) {
            return TRUE;
        } else {
            echo "Add record fail: " . $this->conn->error;
        }
        $this->conn->close();
    }

    public function update($id = NULL, $data = array()) {
        if (!empty($data) && $id) {
            if ($this->check_data_exist($id)) {
                $set = "";
                foreach ($data as $key => $value) {
                    $set .= $key . "='" . $value . "',";
                }
                $set = rtrim($set, ",");
                $sql = "UPDATE $this->table SET $set WHERE $this->id = $id AND deleted = 0";

                if ($this->conn->query($sql)) {
                    return TRUE;
                } else {
                    echo "Update fail: " . $this->conn->error;
                }
                $this->conn->close();
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }

    public function delete($id = NULL) {
        if ($id) {
            if ($this->check_data_exist($id)) {
                $sql = "UPDATE $this->table SET deleted = 1 WHERE $this->id = $id";
                if ($this->conn->query($sql)) {
                    return TRUE;
                } else {
                    echo "Delete fail: " . $this->conn->error;
                }
                $this->conn->close();
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }

    public function get_all_data() {
        $sql = "SELECT * FROM $this->table WHERE deleted = 0";
        $result = $this->conn->query($sql);
        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            echo "There are no record !";
            return NULL;
        }
    }

    public function get_one_value($id, $field = NULL) {
        if (is_array($field) && count($field) > 0) {
            $_field = rtrim(implode(",", $field), ",");
            $sql = "SELECT $_field FROM $this->table WHERE $this->id = $id AND deleted = 0 LIMIT 1";
        } else {
            $sql = "SELECT * FROM $this->table WHERE $this->id = $id AND deleted = 0 LIMIT 1";
        }
        $result = $this->conn->query($sql);
        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            echo "There are no record!";
            return NULL;
        }
    }

    public function get_one_from_field($field = NULL, $data = NULL) {
        $sql = "SELECT * FROM $this->table WHERE $field = $data AND deleted = 0 LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return NULL;
        }
    }

    public function check_data_exist($id = NULL) {
        if ($id) {
            $sql = "SELECT * FROM $this->table WHERE $this->id = $id AND deleted =0";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
            $this->conn->close();
        }
    }
}