<?php


class studentLoader
{
    public static function getStudent(int $id, PDO $pdo): student
    {
        $handle = $pdo->prepare('SELECT s.studentID, s.firstName, s.email, s.className, s.lastName, concat(t.lastName, " ", t.firstName) teacher FROM student s LEFT JOIN teacher t on s.className = t.className WHERE studentId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();

        $studentArray = $handle->fetch(PDO::FETCH_ASSOC);

        return new teacher($studentArray['lastName'], $studentArray['firstName'], $studentArray['email'], new group($studentArray['className']), $studentArray['studentID'], $studentArray['teacher']);
    }

    /**
     * @param PDO $pdo
     * @return teacher[]
     */
    public static function getAllStudents(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT * FROM student order by lastname, firstname');
        $studentsArray = $handle->fetchAll();

        $students = [];
        foreach ($studentsArray as $student) {
            $students[] = new teacher($student['lastName'], $student['firstName'], $student['email'], new group($student['className']), $student['studentID']);
        }
        return $students;
    }

    /**
     * @param PDO $pdo
     * @return teacher[]
     */
    public static function getAllStudentsOfGroup(string $className, PDO $pdo): array {
        $handle = $pdo->prepare('SELECT * FROM student where className = :className order by lastname, firstname');
        $handle->bindValue(':className', $className);
        $handle->execute();

        $studentsArray = $handle->fetchAll(PDO::FETCH_ASSOC);

        $students = [];

        foreach ($studentsArray as $student) {
            $students[] = new teacher($student['lastName'], $student['firstName'], $student['email'], new group($student['className']), $student['studentID']);
        }

        return $students;
    }

//------------------------------------------- studentView update/delete button ------------------------------------------------
    public static function deleteStudent(teacher $student, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM student WHERE studentID = :id');
        $handle->bindValue(':id', $student->getId());
        $handle->execute();
    }

//updated data

    public static function saveStudent(teacher $student, PDO $pdo) : void
    {
        if($student->getId() !== null) {
            $handle = $pdo->prepare('UPDATE student SET firstname=:firstname, lastname=:lastname, email=:email, classname=:classname WHERE studentID = :id'); //add teacher parameter
            $handle->bindValue(':id', $student->getId());
        } else { //insert
            $handle = $pdo->prepare('INSERT INTO student (firstname, lastname, email, classname) VALUES (:firstname, :lastname, :email, :classname)'); //add teacher parameter
        }

        $handle->bindValue(':firstname', $student->getFirstName());
        $handle->bindValue(':lastname', $student->getLastName());
        $handle->bindValue(':email', $student->getEmail());
        $handle->bindValue(':classname', $student->getGroup()->getName());

        $handle->execute();
    }

//----------------------------------------Search function--------------------------------------------------------------
//not working properly
    public static function searchName($search, PDO $pdo): array
    {
        $handle = $pdo->prepare("SELECT s.firstName as studentFirstName, s.lastName as studentlastName, t.firstName, t.lastName FROM student s inner join teacher t on s. className = t.className WHERE s.firstName LIKE :string OR t.firstName LIKE :string OR s.lastName LIKE :string OR t.lastName LIKE :string");
        $handle->bindValue(':string', '%'.$search.'%');
        $handle->execute();
        $results = $handle->fetchAll();
        return $results;

    }
    //$handle->bindValue(':string', '%'.$search.'%');
//SELECT s.*, t.* FROM student s inner join teacher t on s. className = t.className WHERE s.firstName LIKE :string OR t.firstName LIKE :string OR s.lastName LIKE :string OR t.lastName LIKE :string ORDER BY s.lastName, t.lastName
//SELECT s.*, t.* FROM student s inner join teacher t on s. className = t.className WHERE s.firstName LIKE '%$search%' OR t.firstName LIKE '%$search%' OR s.lastName LIKE '%$search%' OR t.lastName LIKE '%$search%' ORDER BY t.lastName, s.lastName
}