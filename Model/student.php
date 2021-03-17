<?php


use JetBrains\PhpStorm\Pure;

class student extends user
{
    private string $teacher;

     #[Pure] public function  __construct($lastName, $firstName, $email, $class, $teacher = null) {
         parent::__construct($lastName, $firstName, $email, $class);

         if ($teacher !== null) {
             $this->teacher = $teacher;
         }
     }

    /**
     * @return string
     */
    public function getTeacher(): string
    {
        return $this->teacher;
    }

    /**
     * @param string $teacher
     */
    public function setTeacher(string $teacher): void
    {
        $this->teacher = $teacher;
    }

}