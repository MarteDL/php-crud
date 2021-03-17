<?php

class StudentController
{

    protected function getStudentInfo()
    {
        $connection = new DbConnect();
        $pdo = $connection->connect();

        $student = studentLoader::getStudent($_GET['id'], $pdo);
        require '?';
    }

}

