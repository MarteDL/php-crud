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

    protected function getAllStudentInfo()
    {
        $connection = new DbConnect();
        $pdo = $connection->connect();

        $allStudents = studentLoader::getAllStudents($pdo);
        require '?';
    }

    protected function createNewStudent()
    {
        $connection = new DbConnect();
        $pdo = $connection->connect();

        $edit = studentLoader::createStudent($pdo);
        require '?';
    }

    protected function editStudent()
    {
        $connection = new DbConnect();
        $pdo = $connection->connect();

        $delete = studentLoader::saveStudent($_GET['id'], $pdo);
        require '?';
    }

}

