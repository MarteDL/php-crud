<?php

class GroupController
{
    private PDO $pdo;

    public function __construct()
    {
        $connection = new DbConnect();
        $this->pdo = $connection->connect();
    }

    public function getGroupInfo($className)
    {
        $group = groupLoader::getGroup($className, $this->pdo);
        require 'View/groupView.php';
    }

    public function getAllGroupsInfo(): void
    {
        $allGroups = groupLoader::getAllGroups($this->pdo);
        require 'View/classes.php';
    }
}
