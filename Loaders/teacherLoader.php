<?php


class teacherLoader
{
    public static function getTeacher(int $id, PDO $pdo): teacher
    {
        $handle = $pdo->prepare('SELECT t.teacherID, t.firstName, t.email, t.className, t.lastName, concat(s.lastName, " " , s.firstName) student FROM teacher t LEFT JOIN student s on t.className = s.className WHERE teacherId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();

        $teacherArray = $handle->fetch(PDO::FETCH_ASSOC);

        return new teacher($teacherArray['lastName'], $teacherArray['firstName'], $teacherArray['email'], new group($teacherArray['className']),self::getAllStudentsOfGroup($teacherArray['className'],$pdo), $teacherArray['teacherID']);
    }
    /**
     * @param PDO $pdo
     * @return teacher[]
     */
    public static function getAllTeachers(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT * FROM teacher order by lastname, firstname');
        $teachersArray = $handle->fetchAll();

        $teachers = [];
        foreach ($teachersArray as $teacher) {
            $teachers[] = new teacher($teacher['lastName'], $teacher['firstName'], $teacher['email'], new group($teacher['className']), self::getAllStudentsOfGroup($teacher['className'],$pdo),  $teacher['teacherID']);
        }
        return $teachers;
    }

    public static function getAllUnasignedTeachers(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT teacherID, firstName, email, lastName FROM teacher WHERE className IS NULL');
        $teachersArray = $handle->fetchAll();

        $teachers = [];
        foreach ($teachersArray as $teacher) {
            $teachers[] = new teacher($teacher['lastName'], $teacher['firstName'], $teacher['email'], null, $teacher['teacherID']);
        }

        return $teachers;
    }

    /**
     * @param PDO $pdo
     * @return student[]
     */
    public static function getAllStudentsOfGroup(string $className, PDO $pdo): array {
        $handle = $pdo->prepare('SELECT * FROM student where className = :className order by lastname, firstname');
        $handle->bindValue(':className', $className);
        $handle->execute();

        $studentsArray = $handle->fetchAll(PDO::FETCH_ASSOC);

        $students = [];

        foreach ($studentsArray as $student) {
            $students[] = new student($student['lastName'], $student['firstName'], $student['email'], new group($student['className']), $student['studentID']);
        }

        return $students;
    }

//------------------------------------------- teacherView update/delete button ------------------------------------------------
    public static function deleteTeacher(string $id, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM teacher WHERE teacherID = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

//updated data
    public static function saveTeacher(teacher $teacher, PDO $pdo) : void
    {
        if($teacher->getId() !== null) {
            $handle = $pdo->prepare('UPDATE teacher SET firstname=:firstname, lastname=:lastname, email=:email, classname=:classname WHERE teacherID = :id');
            $handle->bindValue(':id', $teacher->getId());
        }
        else { //insert
            $handle = $pdo->prepare('INSERT INTO teacher (firstname, lastname, email, classname) VALUES (:firstname, :lastname, :email, :classname)');
        }

        $handle->bindValue(':firstname', $teacher->getFirstName());
        $handle->bindValue(':lastname', $teacher->getLastName());
        $handle->bindValue(':email', $teacher->getEmail());
        $handle->bindValue(':classname', $teacher->getGroup()->getName());

        $handle->execute();
    }
}