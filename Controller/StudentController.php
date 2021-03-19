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

    public function goToCreateStudent($GET): void
    {
        $groups = groupLoader::getAllGroups($this->pdo);
        require 'View/studentCreate.php';
    }

    public function createNewStudent($GET): void
    {
        $group = groupLoader::getGroup($GET['className'], $this->pdo);
        $student = new student($GET['lastName'], $GET['firstName'], $GET['email'], $group, 0, $group->getTeacher());

        studentLoader::saveStudent($student, $this->pdo);

        header("location: ?page=students");
        exit;

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

    public function searchStudentTeacher($search): void
    {
        $results = studentLoader::searchName($search, $this->pdo);
        require 'search.php';
    }
//-------------  checks for correct work of buttons DO NOT REMOVE NOR CHANGE!!!------------------

//check if data were SAVE
    public function saveData(): void
    {
        studentLoader::saveStudent(new student($_POST['lastName'], $_POST['firstName'], $_POST['email'], new group($_POST['className']), $_POST['id']), $this->pdo);
    }

//checking if there is an edit parameter ->edit page
    public function checkEditStudent(): void
    {
        if (isset($_GET['edit'])) {
            $student = studentLoader::getStudent($_GET['edit'], $this->pdo);
            $allGroups = groupLoader::getAllGroups($this->pdo);
            require 'View/studentEdit.php';
        }
    }

    public function checkRemoveStudent(): void
    {
        if (isset($_POST['delete'])) {
            studentLoader::deleteStudent($_POST['id'], $this->pdo);
            //require 'View/studentView.php';
        }
    }
}

