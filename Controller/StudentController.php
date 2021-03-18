<?php

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
        $student = new student($_POST['lastName'], $_POST['firstName'], $_POST['email'], new group($_POST['className']));

        studentLoader::saveStudent($student, $this->pdo);
        require 'View/studentCreate.php';
    }
//should the edit also conclude delete->Student?
    public function editStudent($id)
    {
        $student = studentLoader::getStudent($_GET['id']);
        $student->setEmail($_POST['email']);
        $student->setFirstName($_POST['firstName']);
        $student->setLastName($_POST['lastName']);
        $student->setGroup(new group($_POST['className']));

        studentLoader::saveStudent($student, $this->pdo);
        require 'View/studentEdit.php';
    }

    public function removeStudent()
    {
        studentLoader::deleteStudent($_GET['id'], $this->pdo);
        require 'View/studentView.php';
    }

}

