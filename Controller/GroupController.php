<?php

class GroupController
{
    private PDO $pdo;

    public function __construct()
    {
        $connection = new DbConnect();
        $this->pdo = $connection->connect();
    }

    public function showGroupInfo($groupName) : void
    {
        $group = groupLoader::getGroup($groupName, $this->pdo);
        require 'View/groupView.php';
    }

    public function getAllGroupsInfo(): void
    {
        $allGroups = groupLoader::getAllGroups($this->pdo);
        require 'View/groups.php';
    }


    public function createNewgroup(): void
    {
        $group = new group($_POST['lastName'], $_POST['firstName'], $_POST['email'], new group($_POST['className']));

        groupLoader::savegroup($group, $this->pdo);
        require 'View/groupCreate.php';
    }
//should the edit also conclude delete->group?
    public function editGroup($className): void
    {
        $group = groupLoader::getgroup($className, $this->pdo);
//        $group->setName($_POST['name']);
//        $group->setLocation($_POST['location']);
//        $group->setTeacher($_POST['teacher']);

        groupLoader::savegroup($group, $this->pdo);
        require 'View/groupEdit.php';
    }

    public function removeGroup(): void
    {
        groupLoader::deletegroup($_GET['className'], $this->pdo);
        require 'View/groupView.php';
    }

//-------------  checks for correct work of buttons -----------------

//check if data were SAVEd
    public function checkSavedData(): void
    {
        if (isset($_POST ['save'])) {
            groupLoader::savegroup($_POST['group'], $this->pdo);
        }
    }

//DELETE data check
    public function checkDeletedData(): void
    {
        if (isset($_POST ['delete'])) {
            groupLoader::deletegroup($_POST['className'], $this->pdo);
        }
    }

//checking if there is an edit parameter ->edit page
    public function checkEditGroup(): void
    {
        if (isset($_GET['edit'])) {
            $group = groupLoader::getgroup($_GET['edit'], $this->pdo);
            require 'View/groupEdit.php';
        }
    }
    public function exportingData(){
        export::exportCSV_group($this->pdo);
    }
}
