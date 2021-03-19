<?php


use JetBrains\PhpStorm\Pure;

class teacher extends user
{
    /** @var student[] $student */
    private array|null $students;
    private group|null $group;


    /**
     * @param string $lastName
     * @param string $firstName
     * @param string $email
     * @param group|null $group
     * @param int $id
     * @param array|null $students
     */
    public function __construct(string $lastName, string $firstName, string $email, group|null $group, array|null $students, int $id = 0)
    {
        parent::__construct($lastName, $firstName, $email, $group, $id);
        $this->students = $students ?: [];
    }

    public function getStudents(): array
    {
        return $this->students;

    }


}