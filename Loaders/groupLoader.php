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

        return new group($groupArray['name'], $groupArray['location'], $groupArray['teacher']);
    }

    /** @return group[] */
    public static function getAllGroups(PDO $pdo): array
    {
        $handle = $pdo->query('SELECT * FROM group order by name');
        $groupsArray = $handle->fetchAll();

        $groups = [];
        foreach ($groupsArray as $group) {
            $groups[] = new group($group['name'], $group['location'], $group['teacher']);
        }
        return $groups;
    }
}