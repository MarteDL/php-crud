<?php


class teacherLoader
{
    public static function getTeacher($group, $pdo): teacher 
    {
        $handle = $pdo->prepare('SELECT * FROM teacher WHERE className =: className');
        $handle->bindValue(':className', $group->getName());
        $handle->execute();

        $teacherArray = $handle->fetch(PDO::FETCH_ASSOC);

        return new teacher($teacherArray['lastName'], $teacherArray['firstName'], $teacherArray['email'], new group($teacherArray['className']), $teacherArray['teacherID']);

    }
}