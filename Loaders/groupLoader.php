<?php


class groupLoader
{

    public static function getGroup(string $className, PDO $pdo): group
    {
        $handle = $pdo->prepare('SELECT c.name, c.location, c.teacherID FROM class c WHERE name = :className');
        $handle->bindValue(':className', $className);
        $handle->execute();

        $groupArray = $handle->fetch(PDO::FETCH_ASSOC);

        if ($groupArray['teacherID'] !== null) {
            $teacher = teacherLoader::getTeacher($groupArray['teacherID'], $pdo);
            $students = studentLoader::getAllStudentsOfGroup($className, $pdo);
        }

        else {
            $teacher = null;
            $students = [];
        }

        return new group($groupArray['name'], $groupArray['location'], $teacher, $students);
    }

    /**
     * @param PDO $pdo
     * @return group[]
     */
    public static function getAllAssignedGroups(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT name, location, teacherID FROM class WHERE teacherID IS NOT NULL ORDER BY name');
        $groupsArray = $handle->fetchAll();

        $groups = [];


        foreach ($groupsArray as $group) {
            $teacher = teacherLoader::getTeacher($group['teacherID'], $pdo);
            $groups[] = new group($group['name'], $group['location'], $teacher);
        }
        return $groups;
    }

    public static function getTeacher($group, $pdo): teacher
    {
        $handle = $pdo->prepare('SELECT * FROM teacher WHERE className =: className');
        $handle->bindValue(':className', $group->getName());
        $handle->execute();

        $teacherArray = $handle->fetch(PDO::FETCH_ASSOC);
//do not delete this part -> related to teacherView!!!!!!!!!!!!!!!!!!!!!!!!
        return new teacher($teacherArray['lastName'], $teacherArray['firstName'], $teacherArray['email'], new group($teacherArray['className']),  teacherLoader::getAllStudentsOfGroup($teacherArray['className'],$pdo), $teacherArray['teacherID']);

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


    public static function saveGroup($group, $teacher, PDO $pdo): void
    {
        if($group->getName() !== null) {
            $handle = $pdo->prepare('UPDATE class SET location = :location, teacherID = :teacherId WHERE name = :classname');
            $handle->bindValue(':classname', $group->getName());
            $handle->bindValue(':location', $group->getLocation());
            $handle->bindValue(':teacherId', $group->getTeacher()->getId());
            $handle->execute();
        }
        else {
            $handle = $pdo->prepare('INSERT INTO class (name, location, teacherID) VALUES (:name, :location, :teacherID)');
            $handle->bindValue(':name', $group->getName());
            $handle->bindValue(':location', $group->getLocation());
            $handle->bindValue(':teacherID', $teacher->getId());
            $handle->execute();
        }
    }

//    public static function addTeacherToGroup($teacherId, $className, $pdo)
//    {
//        $handle = $pdo->prepare('UPDATE class SET teacherID = :teacherID WHERE className = :className ');
//        $handle->bindValue(':teacherId', $teacherId);
//        $handle->bindValue(':className', $className);
//        $handle->execute();
//
//    }
}