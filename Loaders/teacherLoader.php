<?php


class teacherLoader
{
    public static function getTeacher(int $id, PDO $pdo) : teacher
    {
        $handle = $pdo->prepare('SELECT t.teacherID, t.firstName, t.email, t.className, t.lastName, concat(s.lastName, " " , s.firstName) student FROM teacher t LEFT JOIN student s on t.className = s.className WHERE teacherId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();

        $teacherArray = $handle->fetch(PDO::FETCH_ASSOC);

        return new teacher($teacherArray['lastName'], $teacherArray['firstName'], $teacherArray['email'], new group($teacherArray['className']), $teacherArray['studentID'], $teacherArray['teacher'teacher);
    }