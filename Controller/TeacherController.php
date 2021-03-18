<?php

class TeacherController
{
    private PDO $pdo;

    public function __construct()
    {
        $connection = new DbConnect();
        $this->pdo = $connection->connect();
    }
    public function showTeacherInfo($teacherName) : void
    {
        $teacher = teacherLoader::getTeacher($teacherName, $this->pdo);
        require 'View/teacherView.php';
    }

    public function getTeacherInfo(int $id): teacher
    {
        $teacher = teacherLoader::getTeacher($id, $this->pdo);
        require 'View/teacherEdit.php';
    }

    public function getAllTeachersInfo(): void
    {
        $allTeachers = teacherLoader::getAllTeachers($this->pdo);
        require 'View/teachers.php';
    }


    public function createNewTeacher(): void
    {
        $teacher = new teacher($_POST['firstName'],$_POST['lastName'], $_POST['email'], new group($_POST['className']));

        teacherLoader::saveTeacher($teacher, $this->pdo);
        require 'View/teacherCreate.php';
    }
//should the edit also conclude delete->Teacher?
    public function editTeacher($id): void
    {
        $teacher = teacherLoader::getTeacher($_GET['id']);
        $teacher->setFirstName($_POST['firstName']);
        $teacher->setLastName($_POST['lastName']);
        $teacher->setEmail($_POST['email']);
       // $teacher->setStudents($_POST['students']);
        $teacher->setGroup(new group($_POST['className']));

        teacherLoader::saveTeacher($teacher, $this->pdo);
        require 'View/teacherEdit.php';
    }

    public function removeTeacher(): void
    {
        teacherLoader::deleteTeacher($_GET['id'], $this->pdo);
        require 'View/teacherView.php';
    }

//-------------  checks for correct work of buttons -----------------

//check if data were SAVE
    public function saveData(): void
    {
            teacherLoader::saveTeacher(new teacher($_POST['firstName'],$_POST['lastName'],$_POST['email'],new group($_POST['className'])), $this->pdo);
    }

//checking if there is an edit parameter ->edit page
    public function checkEditTeacher(): void
    {
        if (isset($_GET['edit'])) {
            $group = teacherLoader::getTeacher($_GET['edit'], $this->pdo);
            require 'View/teacherEdit.php';
        }
    }
}

