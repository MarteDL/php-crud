<?php

use JetBrains\PhpStorm\Pure;
require "user.php";

class student extends user
{
    private string $teacher;

     #[Pure] public function  __construct($lastName, $firstName, $email, $class, $id, $teacher = null) {
         parent::__construct($lastName, $firstName, $email, $class, $id);

         if ($teacher !== null) {
             $this->teacher = $teacher;
         }
     }

    public function getTeacher(): string
    {
        return $this->teacher;
    }

    public function setTeacher(string $teacher): void
    {
        $this->teacher = $teacher;
    }
}