<?php

require "Model/DbConnect.php";
require "Loaders/studentLoader.php";

class StudentController
{

    public function getStudentInfo()
    {
        $connection = new DbConnect();
        $pdo = $connection->connect();

        $student = studentLoader::getStudent($_GET['id'] = 6, $pdo);
        require 'View/studentView.php';
    }

}

