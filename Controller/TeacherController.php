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

    public function getAllTeachersInfo(): void
    {
        $allTeachers = teacherLoader::getAllTeachers($this->pdo);
        require 'View/teachers.php';
    }


    public function createNewTeacher(): void
    {
        $teacher = new teacher($_POST['lastName'], $_POST['firstName'], $_POST['email'], new teacher($_POST['className']));

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
        $teacher->setStudents($_POST['students']);//????
        $teacher->setGroup(new group($_POST['className']));//???

        teacherLoader::saveTeacher($teacher, $this->pdo);
        require 'View/teacherEdit.php';
    }

    public function removeTeacher(): void
    {
        teacherLoader::deleteTeacher($_GET['id'], $this->pdo);
        require 'View/teacherView.php';
    }

//-------------  checks for correct work of buttons -----------------

//check if data were SAVEd
    public function checkSavedData(): void
    {
        if (isset($_POST ['save'])) {
            teacherLoader::saveTeacher($_POST['teacher'], $this->pdo);
        }
    }

//DELETE data check
    public function checkDeletedData(): void
    {
        if (isset($_POST ['delete'])) {
            teacherLoader::deleteTeacher($_POST['teacher'], $this->pdo);
        }
    }

//checking if there is an edit parameter ->edit page
    public function checkEditTeacher(): void
    {
        if (isset($_GET['edit'])) {
            $group = teacherLoader::getTeacher($_GET['edit'], $this->pdo);
            require 'View/teacherEdit.php';
        }
    }
    public function exportingData(){
        export::exportCSV_teacher($this->pdo);
    }
}

