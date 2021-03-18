<?php


use JetBrains\PhpStorm\Pure;

class teacher extends user
{
    /** @var teacher[] */
    private array $students;


    #[Pure] public function __construct(string $lastName, string $firstName, string $email, group $group, int $id = 0)
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