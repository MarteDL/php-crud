<?php

class studentLoader
{
    public static function getStudent(int $id, PDO $pdo) : student
    {
        $handle = $pdo->prepare('SELECT s.studentID, s.firstName, s.email, s.className, s.lastName, concat(t.lastName, " ", t.firstName) teacher FROM student s LEFT JOIN teacher t on s.className = t.className WHERE studentID = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();

        $studentArray = $handle->fetch(PDO::FETCH_ASSOC);

        return new student($studentArray['lastName'], $studentArray['firstName'], $studentArray['email'], new group($studentArray['className']), $studentArray['studentID'], $studentArray['teacher']);
    }

    /** @return student[] */
    public static function getAllStudents(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT * FROM student order by lastname, firstname');
        $studentsArray = $handle->fetchAll();

        $students = [];
        foreach ($studentsArray as $student) {
            $students[] = new student($student['lastName'], $student['firstName'], $student['email'], new group($student['className']), $student['studentID']);
        }
        return $students;
    }

//------------------------------------------- studentView update/delete button ------------------------------------------------
    public static function deleteStudent(student $student, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM student WHERE studentID = :id');
        $handle->bindValue(':id', $student->getId());
        $handle->execute();
    }

//updated data
    public static function saveStudent(student $student, PDO $pdo) : void
    {
        if($student->getId() !== null) {
            $handle = $pdo->prepare('UPDATE student SET firstname=:firstname, lastname=:lastname, email=:email, classname=:classname WHERE studentID = :id'); //add teacher parameter
            $handle->bindValue(':id', $student->getId());
        }
        else { //insert
            $handle = $pdo->prepare('INSERT INTO student (firstname, lastname, email, classname) VALUES (:firstname, :lastname, :email, :classname)'); //add teacher parameter
        }

        $handle->bindValue(':firstname', $student->getFirstName());
        $handle->bindValue(':lastname', $student->getLastName());
        $handle->bindValue(':email', $student->getEmail());
        $handle->bindValue(':classname', $student->getGroup()->getName());
        // $handle->bindValue(':teacher',$newData['teacher']);
        $handle->execute();
    }

}