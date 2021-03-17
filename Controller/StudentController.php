<?php

require "Model/DbConnect.php";
require "Loaders/studentLoader.php";

class StudentController
{
    private PDO $pdo;

    public function __construct()
    {
        $connection = new DbConnect();
        $this->pdo = $connection->connect();
    }

    public function getStudentInfo($id)
    {
        $student = studentLoader::getStudent($id, $this->pdo);
        require 'View/studentView.php';
    }

    public function getAllStudentInfo(): void
    {
        $allStudents = studentLoader::getAllStudents($this->pdo);
        require 'View/students.php';
    }

    public function createNewStudent()
    {
        $create = studentLoader::createStudent($this->pdo);
        require 'View/studentCreate.php';
    }
//should the edit also conclude delete->Student?
    public function editStudent()
    {
        $edit = studentLoader::saveStudent($_GET['id'], $this->pdo);
        require 'View/studentEdit.php';
    }

    public function removeStudent()
    {
        $delete = studentLoader::deleteStudent($_GET['id'], $this->pdo);
        require 'View/studentView.php';
    }

}

