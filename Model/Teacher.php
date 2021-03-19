<?php


class teacher extends user
{
    /** @var student[] $student */
    private array $students;


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