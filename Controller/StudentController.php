<?php

class StudentController extends student {

    protected function getStudentInfo(){
        if (isset($_GET['studentInfo'])){
            $student = new StudentController();
            require 'View/StudentView.php';
        }
    }

}