<?php
session_start();

class Student_controller {
    //get all student
    public function getAllStudents() {
        return isset($_SESSION['students']) ? $_SESSION['students'] : array();
    }

    //get student by id
    public function getStudent($student_id) {
        //get list student to find
        $students = $this->getAllStudents();
        //find student by foreach
        foreach ($students as $item) {
            if ($item['student_id'] == $student_id) {
                return $item;
            }
        }
        return array();
    }

    //delete student
    public function deleteStudent($student_id) {
        //get list student to find
        $students = $this->getAllStudents();
        foreach ($students as $key => $item) {
            if ($item['student_id'] == $student_id) {
                unset($students[$key]);
            }
        }
        //save to session
        $_SESSION['students'] = $students;

        return $students;
    }

    //add student
    public function addStudent($student_id, $student_name, $student_email, $file) {
        $students = $this->getAllStudents();
        $new_student = array(
            'student_id'    => $student_id,
            'student_name'  => $student_name,
            'student_email' => $student_email,
            'avatar'     => $file,
        );
        $check = TRUE;
        foreach ($students as $item) {
            if ($item['student_id'] == $student_id) {
                $check = FALSE;
            }
        }
        if ($check) {
            $students[] = $new_student;
        } else {
            echo "Students already exist!";
        }
        $_SESSION['students'] = $students;
        return $students;
    }

    //update student
    public function updateStudent($student_id, $student_name, $student_email, $file) {
        $students = $this->getAllStudents();
        $update_information = array(
            'student_id'    => $student_id,
            'student_name'  => $student_name,
            'student_email' => $student_email,
            'avatar'     => $file,
        );
        $check = FALSE;
        foreach ($students as $key => $item) {
            if ($item['student_id'] == $student_id) {
                $students[$key] = $update_information;
                $check = TRUE;
            }
        }
        if ($check == FALSE) {
            echo "Student does not exist!";
        }
        $_SESSION['students'] = $students;
        return $students;
    }
}