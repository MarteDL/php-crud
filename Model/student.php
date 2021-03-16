<?php


use JetBrains\PhpStorm\Pure;

class student extends teacher
{
    private string $class;
    private string $assignedTeacher;

     public function __construct($name, $email) {
         parent::__construct($name, $email);
     }

}