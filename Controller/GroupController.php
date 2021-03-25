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
        $allGroups = groupLoader::getAllAssignedGroups($this->pdo);
        require 'View/groups.php';
    }

    public function goToCreateGroup(): void
    {
        $teachers = teacherLoader::getAllUnasignedTeachers($this->pdo);
        require 'View/groupCreate.php';
    }

    public function createGroup(array $GET): void
    {
        if (isset($GET['teacherId'])) {
            $teacher = teacherLoader::getTeacher($GET['teacherId'], $this->pdo);
        } else {
            $teacher = null;
        }
        $group = new group($GET['name'], $GET['location'], $teacher);

        groupLoader::savegroup($group, $teacher, $this->pdo);

        header("location: ?page=groups");
        exit;
    }

//should the edit also conclude delete->group?
    public function editGroup($GET): void
    {
        $group = groupLoader::getgroup($GET['name'], $this->pdo);

        $group->setName($GET['name']);
        $group->setLocation($GET['location']);
        $group->setTeacher(teacherLoader::getTeacher($GET['teacherId'], $this->pdo));

        groupLoader::saveGroup($group, $this->pdo);
        require 'View/groupEdit.php';
    }

    public function goToEditGroup($className): void
    {
        $group = groupLoader::getgroup($className, $this->pdo);
        $teachers = teacherLoader::getAllUnasignedTeachers($this->pdo);

        require 'View/groupEdit.php';
    }

    public function checkRemoveGroup(): void
    {
        if (isset($_POST ['delete'])) {
            groupLoader::deletegroup($_POST['className'], $this->pdo);
        }
    }

//-------------  checks for correct work of buttons -----------------

    public function exportingData()
    {
        export::exportCSV_group($this->pdo);
    }

}
