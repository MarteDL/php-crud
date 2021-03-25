<?php

use JetBrains\PhpStorm\Pure;

class student extends user
{
    private ?teacher $teacher;

    #[Pure] public function __construct(string $lastName, string $firstName, string $email, group $group, int $id = 0, ?teacher $teacher = null)
    {
        parent::__construct($lastName, $firstName, $email, $group, $id);
        $this->teacher = $teacher;

    }

    //@todo return Teacher object
    public function getTeacher():? teacher
    {
        return $this->teacher;
    }
}