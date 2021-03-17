<?php


class studentLoader
{
    public static function getStudent(int $id, PDO $pdo): student
    {
        $handle = $pdo->prepare('SELECT firstname, lastname, email, classname FROM student WHERE studentId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();

        $studentArray = $handle->fetch(PDO::FETCH_ASSOC);

        return new student($studentArray['lastname'], $studentArray['firstname'], $studentArray['email'], $studentArray['classname']);
    }

    public static function getAllStudents(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT firstname, lastname, email, classname FROM student');
        $studentsArray = $handle->fetchAll();

        $students = [];

        foreach ($studentsArray as $student) {
            $students[] = new student($student['lastname'], $student['firstname'], $student['email'], $student['classname']);
        }
        return $students;
    }
}