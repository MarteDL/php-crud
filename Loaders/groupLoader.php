<?php



class groupLoader
{

    public static function getGroup(string $className, PDO $pdo) : group
    {
        $handle = $pdo->prepare('SELECT c.name, c.location, concat(t.lastName, " ", t.firstName) teacher
FROM class c LEFT JOIN teacher t on c.name = t.className WHERE className = :className');
        $handle->bindValue(':className', $className);
        $handle->execute();

        $groupArray = $handle->fetch(PDO::FETCH_ASSOC);

        $groups = studentLoader::getAllStudentsOfGroup($className, $pdo);

        return new group($groupArray['name'], $groupArray['location'], $groupArray['teacher'], $groups);
    }

    /**
     * @param PDO $pdo
     * @return group[]
     */
    public static function getAllGroups(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT c.name, c.location, concat(t.lastName, " ", t.firstName) teacher
FROM class c LEFT JOIN teacher t on c.name = t.className ORDER BY name');
        $groupsArray = $handle->fetchAll();

        $groups = [];
        foreach ($groupsArray as $group) {
            $groups[] = new group($group['name'], $group['location'], $group['teacher']);
        }
        return $groups;
    }

    public static function getTeacher($group, $pdo): teacher
    {
        $handle = $pdo->prepare('SELECT * FROM teacher WHERE className =: className');
        $handle->bindValue(':className', $group->getName());
        $handle->execute();

        $teacherArray = $handle->fetch(PDO::FETCH_ASSOC);
//do not delete this part -> related to teacherView!!!!!!!!!!!!!!!!!!!!!!!!
        return new teacher($teacherArray['lastName'], $teacherArray['firstName'], $teacherArray['email'], new group($teacherArray['className']),  teacherLoader::getAllStudentsOfGroup($teacherArray['className'],$pdo), $teacherArray['teacherID']);

    }

    public static function deleteGroup(group $group, PDO $pdo): void
    {
        $handle = $pdo->prepare('DELETE FROM class WHERE className = :className');
        $handle->bindValue(':className', $group->getName());
        $handle->execute();
    }

//updated data
    public static function saveGroup(group $group, PDO $pdo) : void
    {
        if($group->getName() !== null) {
            $handle = $pdo->prepare('UPDATE class SET name=:name, location=:location, teacherID=:teacherID WHERE name=:classname');
            $handle->bindValue(':name', $group->getName());
        }
        else { //insert
            $handle = $pdo->prepare('INSERT INTO class (name, location, teacherID) VALUES (:name, :location, :teacherID)');
        }

        $handle->bindValue(':name', $group->getName());
        $handle->bindValue(':location', $group->getLocation());
        $handle->bindValue(':teacher', $group->getTeacher());
        $handle->execute();
    }
}