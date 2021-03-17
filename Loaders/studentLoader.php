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
        $handle = $pdo->query('SELECT * FROM student');
        return $handle->fetchAll();
    }

//------------------------------------------- studentView update/delete button ------------------------------------------------
    public function deleteStudent(int $id, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM student WHERE studentId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

//updated data
    public function saveStudent(array $newData, PDO $pdo)
    {
        $handle = $pdo->prepare('UPDATE student SET firstname=:firstname, lastname=:lastname, email=:email, classname=:classname WHERE studentId = :id'); //add teacher parameter
        $handle->bindValue(':id', $newData['studentID']);
        $handle->bindValue(':firstname',$newData['firstName']);
        $handle->bindValue(':lastname',$newData['lastName']);
        $handle->bindValue(':email',$newData['email']);
        $handle->bindValue(':classname',$newData['className']);
     // $handle->bindValue(':teacher',$newData['teacher']);
        $handle->execute();
    }
}