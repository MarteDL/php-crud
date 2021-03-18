<?php


class teacherLoader
{
    public static function getTeacher(int $id, PDO $pdo): teacher
    {
        $handle = $pdo->prepare('SELECT t.teacherID, t.firstName, t.email, t.className, t.lastName, concat(s.lastName, " " , s.firstName) student FROM teacher t LEFT JOIN student s on t.className = s.className WHERE teacherId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();

        $teacherArray = $handle->fetch(PDO::FETCH_ASSOC);

        return new teacher($teacherArray['lastName'], $teacherArray['firstName'], $teacherArray['email'], new group($teacherArray['className']), $teacherArray['teacherID'], $teacherArray['student']);
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
            $teachers[] = new teacher($teacher['lastName'], $teacher['firstName'], $teacher['email'], new teacher($teacher['className']), $teacher['studentID']);
        }
        return $teachers;
    }

    /**
     * @param PDO $pdo
     * @return teacher[]
     */
    public static function getAllTeachersOfGroup(string $className, PDO $pdo): array {
        $handle = $pdo->prepare('SELECT * FROM teacher where className = :className order by lastname, firstname');
        $handle->bindValue(':className', $className);
        $handle->execute();

        $teachersArray = $handle->fetchAll(PDO::FETCH_ASSOC);

        $teachers = [];

        foreach ($teachersArray as $teacher) {
            $teachers[] = new teacher($teacher['lastName'], $teacher['firstName'], $teacher['email'], new group($teacher['className']), $teacher['studentID']);
        }

        return $teachers;
    }

//------------------------------------------- teacherView update/delete button ------------------------------------------------
    public static function deleteTeacher(teacher $teacher, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM teacher WHERE teacherID = :id');
        $handle->bindValue(':id', $teacher->getId());
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