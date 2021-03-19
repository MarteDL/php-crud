<?php


use JetBrains\PhpStorm\Pure;

class teacher extends user
{
    private group|null $group;
    private array $students;

    /**
     * @param string $lastName
     * @param string $firstName
     * @param string $email
     * @param group|null $group
     * @param int $id
     * @param null $students
     */
//    private array $students;


    #[Pure] public function __construct(string $lastName, string $firstName, string $email, group|null $group = null, int $id = 0, $students = null)
    {
        parent::__construct($lastName, $firstName, $email, $group, $id);

        if ($students !== null) {
            $this->students = $students;
        }

    }

    public function getStudents(): array
    {
        return $this->students;
    }

}