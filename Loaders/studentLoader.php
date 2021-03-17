<?php


class studentLoader
{
    private array $newData = [];

        public static function getStudent(int $id, PDO $pdo) : student
        {
            $handle = $pdo->prepare('SELECT s.studentID, s.firstName, s.email, s.className, s.lastName, concat(t.lastName, " ", t.firstName) teacher FROM student s LEFT JOIN teacher t on s.className = t.className WHERE studentId = :id');
            $handle->bindValue(':id', $id);
            $handle->execute();

            $studentArray = $handle->fetch(PDO::FETCH_ASSOC);

        return new student($studentArray['lastName'], $studentArray['firstName'], $studentArray['email'], $studentArray['className'], $studentArray['studentID'], $studentArray['teacher']);
    }

    public static function getAllStudents(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT * FROM student');
        $studentsArray = $handle->fetchAll();

        $students = [];
        foreach ($studentsArray as $student) {
            $students[] = new student($student['lastName'], $student['firstName'], $student['email'], $student['className'], $student['studentID']);
        }
        return $students;
    }

//------------------------------------------- studentView update/delete button ------------------------------------------------
    public static function deleteStudent(int $id, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM student WHERE studentId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

//updated data
    public static function saveStudent(array $newData, PDO $pdo)
    {
        $handle = $pdo->prepare('UPDATE student SET firstname=:firstname, lastname=:lastname, email=:email, classname=:classname WHERE studentId = :id'); //add teacher parameter
        $handle->bindValue(':id', $newData['studentID']);
        $handle->bindValue(':firstname', $newData['firstName']);
        $handle->bindValue(':lastname', $newData['lastName']);
        $handle->bindValue(':email', $newData['email']);
        $handle->bindValue(':classname', $newData['className']);
        // $handle->bindValue(':teacher',$newData['teacher']);
        $handle->execute();
    }

}