<?php

use JetBrains\PhpStorm\Pure;


class student extends user
{
    private string $teacher;

     #[Pure] public function  __construct(string $lastName, string $firstName, string $email, group $group, int $id = 0, $teacher = null) {
         parent::__construct($lastName, $firstName, $email, $group, $id);

         if ($teacher !== null) {
             $this->teacher = $teacher;
         }
     }

     //@todo return Teacher object
    public function getTeacher(): string
    {
        return $this->teacher;
    }

    public function setTeacher(string $teacher): void
    {
        $this->teacher = $teacher;
    }
}