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

    protected function getStudentInfo()
    {
        $student = studentLoader::getStudent($_GET['id'], $this->pdo);
        require 'View/studentView.php';
    }

    protected function getAllStudentInfo()
    {
        $allStudents = studentLoader::getAllStudents($this->pdo);
        require 'View/students.php';
    }

    protected function createNewStudent()
    {
        $create = studentLoader::createStudent($this->pdo);
        require 'View/studentCreate.php';
    }
//should the edit also conclude delete->Student?
    protected function editStudent()
    {
        $edit = studentLoader::saveStudent($_GET['id'], $this->pdo);
        require 'View/studentEdit.php';
    }

    protected function removeStudent()
    {
        $delete = studentLoader::deleteStudent($_GET['id'], $this->pdo);
        require 'View/studentView.php';
    }

}

