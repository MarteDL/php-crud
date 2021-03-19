<?php

class GroupController
{
    private PDO $pdo;

    public function __construct()
    {
        $connection = new DbConnect();
        $this->pdo = $connection->connect();
    }

    public function showGroupInfo($groupName): void
    {
        $group = groupLoader::getGroup($groupName, $this->pdo);
        require 'View/groupView.php';
    }

    public function getAllGroupsInfo(): void
    {
        $allGroups = groupLoader::getAllGroups($this->pdo);
        require 'View/groups.php';
    }

    public function goToCreateGroup(): void
    {
        $teachers = teacherLoader::getAllUnasignedTeachers($this->pdo);
        require 'View/groupCreate.php';
    }

    public function createGroup(array $GET): void
    {
        var_dump($GET);

        $teacher = teacherLoader::getTeacher($GET['teacherId'], $this->pdo);
        $group = new group($GET['name'], $GET['location'], $teacher);

        groupLoader::savegroup($group, $teacher, $this->pdo);

        require 'View/groupView.php';
    }

//should the edit also conclude delete->group?
    public function editGroup($POST, $className): void
    {
        $group = groupLoader::getgroup($className, $this->pdo);
        $group->setName($POST['name']);
        $group->setLocation($POST['location']);
        $group->setTeacher($POST['teacher']);

        groupLoader::editGroup($group, $className, $this->pdo);
        require 'View/groupEdit.php';
    }

    public function goToEditGroup($className): void
    {
        $group = groupLoader::getgroup($className, $this->pdo);
        require 'View/groupEdit.php';
    }

    public function removeGroup(): void
    {
        groupLoader::deletegroup($_GET['className'], $this->pdo);
        require 'View/groupView.php';
    }

//-------------  checks for correct work of buttons -----------------

//check if data were SAVEd
//    public function checkSavedData(): void
//    {
//        if (isset($_POST ['save'])) {
//            groupLoader::savegroup($_POST['group'], $this->pdo);
//        }
//    }

//DELETE data check
//    public function checkDeletedData(): void
//    {
//        if (isset($_POST ['delete'])) {
//            groupLoader::deletegroup($_POST['className'], $this->pdo);
//        }
//    }

//checking if there is an edit parameter ->edit page
//    public function checkEditGroup(): void
//    {
//        if (isset($_GET['edit'])) {
//            $group = groupLoader::getgroup($_GET['edit'], $this->pdo);
//            require 'View/groupEdit.php';
//        }
//    }
}
