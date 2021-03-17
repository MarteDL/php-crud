<?php


class studentLoader
{
        public static function getStudent(int $id, PDO $pdo) : student
        {
            $handle = $pdo->prepare('SELECT s.studentID, s.studentID, s.firstName, s.email, s.className, s.lastName, concat(t.lastName, ' ', t.firstName) teacher FROM student s LEFT JOIN teacher t on s.className = t.className WHERE studentId = :id');
            $handle->bindValue(':id', $id);
            $handle->execute();

            $studentArray = $handle->fetch(PDO::FETCH_ASSOC);

            return new student($studentArray['lastname'], $studentArray['firstname'], $studentArray['email'], $studentArray['classname'], $studentArray['teacher']);
        }

        public static function getAllStudents(PDO $pdo): array
        {
            $handle = $pdo->query('SELECT firstname, lastname, email, classname FROM student');
            $studentsArray = $handle->fetchAll();

            $students = [];

            foreach ($studentsArray AS $student) {
                $students[] = new student($student['lastname'], $student['firstname'], $student['email'], $student['classname']);
            }

            return $students;
        }

}