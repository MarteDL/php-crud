<?php


class studentLoader
{
    public static function getStudent(int $id, PDO $pdo) : student
    {
        $handle = $pdo->prepare('SELECT s.studentID, s.firstName, s.email, s.className, s.lastName, t.teacherID FROM student s LEFT JOIN teacher t on s.className = t.className WHERE studentId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();

        $studentArray = $handle->fetch();
        $teacher = teacherLoader::getTeacher($studentArray['teacherID'], $pdo);

        return new student($studentArray['lastName'], $studentArray['firstName'], $studentArray['email'], new group($studentArray['className']), $studentArray['studentID'], $teacher);
    }

    /**
     * @param PDO $pdo
     * @return student[]
     */
    public static function getAllStudents(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT * FROM student order by lastname, firstname');
        $studentsArray = $handle->fetchAll();

        $students = [];
        foreach ($studentsArray as $student) {
            $teacher = teacherLoader::getTeacher($student['teacherID'], $pdo);
            $students[] = new student($student['lastName'], $student['firstName'], $student['email'], new group($student['className']), $student['studentID'], $teacher);
        }
        return $students;
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

//------------------------------------------- studentView update/delete button ------------------------------------------------
    public static function deleteStudent(string $id, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM student WHERE studentID = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

//updated data
    public static function saveStudent(student $student, PDO $pdo) : void
    {
        if($student->getId()) {
            $handle = $pdo->prepare('UPDATE student SET firstname=:firstname, lastname=:lastname, email=:email, classname=:classname WHERE studentID = :id'); //add teacher parameter
            $handle->bindValue(':id', $student->getId());
        }else { //insert
            $handle = $pdo->prepare('INSERT INTO student (firstname, lastname, email, classname) VALUES (:firstname, :lastname, :email, :classname)'); //add teacher parameter
        }

        $handle->bindValue(':firstname', $student->getFirstName());
        $handle->bindValue(':lastname', $student->getLastName());
        $handle->bindValue(':email', $student->getEmail());
        $handle->bindValue(':classname', $student->getGroup()?->getName());

        $handle->execute();
    }


//----------------------------------------Search function--------------------------------------------------------------

    /**
     * @return user[]
     */
    public static function searchName($search, PDO $pdo): array
    {
        $handle = $pdo->prepare("SELECT studentID, firstName , lastName FROM student WHERE (student.firstName LIKE :string OR student.lastName LIKE :string) UNION SELECT teacherID, firstName , lastName FROM teacher WHERE (teacher.firstName LIKE :string OR teacher.lastName LIKE :string);");
        $handle->bindValue(':string', '%'.$search.'%');
        $handle->execute();
        return $handle->fetchAll();

    }

}