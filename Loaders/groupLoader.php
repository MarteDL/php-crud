<?php


class groupLoader
{

    public static function getGroup(string $className, PDO $pdo): group
    {
        $handle = $pdo->prepare('SELECT c.name, c.location, c.teacherID FROM class c WHERE name = :className');
        $handle->bindValue(':className', $className);
        $handle->execute();

        $groupArray = $handle->fetch(PDO::FETCH_ASSOC);

        $students = studentLoader::getAllStudentsOfGroup($className, $pdo);
        $teacher = teacherLoader::getTeacher($groupArray['teacherID'], $pdo);

        return new group($groupArray['name'], $groupArray['location'], $teacher, $students);
    }

    /**
     * @param PDO $pdo
     * @return group[]
     */
    public static function getAllGroups(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT name, location, teacherID FROM class ORDER BY name');
        $groupsArray = $handle->fetchAll();

        $groups = [];
        foreach ($groupsArray as $group) {
            $teacher = teacherLoader::getTeacher($group['teacherID'], $pdo);
            $groups[] = new group($group['name'], $group['location'], $teacher);
        }
        return $groups;
    }

    public static function getAllUnasignedGroups(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT name, location FROM class WHERE teacherID IS NULL ');
        $groupsArray = $handle->fetchAll();
        $groups = [];

        foreach ($groupsArray as $group) {
            $groups[] = new group($group['name'], $group['location']);
        }
        return $groups;
    }

    public static function deleteGroup(group $group, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM class WHERE className = :className');
        $handle->bindValue(':className', $group->getName());
        $handle->execute();
    }

//updated data
    public static function editGroup(group $group, $className, PDO $pdo): void
    {

        $handle = $pdo->prepare('UPDATE class SET name = :name, location = :location WHERE name = :classname');
        $handle->bindValue(':name', $group->getName());
        $handle->bindValue(':location', $group->getLocation());
        $handle->bindValue(':classname', $className);
        $handle->execute();

    }

    public static function saveGroup($group, $teacher, PDO $pdo): void
    {
        $handle = $pdo->prepare('INSERT INTO class (name, location, teacherID) VALUES (:name, :location, :teacherID)');
        $handle->bindValue(':name', $group->getName());
        $handle->bindValue(':location', $group->getLocation());
        $handle->bindValue(':teacherID', $teacher->getId());
        $handle->execute();
    }
}