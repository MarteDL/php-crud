<?php

class StudentController
{
    private PDO $pdo;

    public function __construct()
    {
        $connection = new DbConnect();
        $this->pdo = $connection->connect();
    }

    public function showStudentInfo(int $id): void
    {
        $student = studentLoader::getStudent($id, $this->pdo);
        require 'View/studentView.php';
    }

    public function getStudentInfo(int $id): student
    {
        $student = studentLoader::getStudent($id, $this->pdo);
        require 'View/studentEdit.php';
    }

    public function getAllStudentInfo(): void
    {
        $allStudents = studentLoader::getAllStudents($this->pdo);
        require 'View/students.php';
    }

    public function createNewStudent(): void
    {
        $student = new student($_POST['lastName'], $_POST['firstName'], $_POST['email'], new group($_POST['className']));

        studentLoader::saveStudent($student, $this->pdo);
        require 'View/studentCreate.php';
    }
//should the edit also conclude delete->Student?
    public function editStudent($id): void
    {
        $student = studentLoader::getStudent($_GET['id']);
        $student->setEmail($_POST['email']);
        $student->setFirstName($_POST['firstName']);
        $student->setLastName($_POST['lastName']);
        $student->setGroup(new group($_POST['className']));

        studentLoader::saveStudent($student, $this->pdo);
        require 'View/studentEdit.php';
    }

    public function removeStudent(): void
    {
        studentLoader::deleteStudent($_GET['id'], $this->pdo);
        require 'View/studentView.php';
    }

//-------------  checks for correct work of buttons -----------------

//check if data were SAVEd
    public function checkSavedData(): void
    {
        if (isset($_POST ['save'])) {
            studentLoader::saveStudent($_POST['student'], $this->pdo);
        }
    }

//DELETE data check
    public function checkDeletedData(): void
    {
        if (isset($_POST ['delete'])) {
            studentLoader::deleteStudent($_POST['id'], $this->pdo);
        }
    }

//checking if there is an edit parameter ->edit page
    public function checkEditStudent(): void
    {
        if (isset($_GET['edit'])) {
            $student = studentLoader::getStudent($_GET['edit'], $this->pdo);
            require 'View/studentEdit.php';
        }
    }
}

