<?php


use JetBrains\PhpStorm\Pure;

class teacher extends user
{
    /** @var student[] $student */
    private array $students;
    private group|null $group;

    public function __construct(string $lastName, string $firstName, string $email, group|null $group, array $students = [], int $id = 0)
    {
        parent::__construct($lastName, $firstName, $email, $group, $id);
        $this->students = $students;
    }

    public function getStudents(): array
    {
        return $this->students;

    }


}