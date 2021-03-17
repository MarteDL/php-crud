<?php


use JetBrains\PhpStorm\Pure;
require "user.php";

class teacher extends user
{
    private array $students;

    #[Pure] public function __construct(int $id = 0, string $lastName, string $firstName, string $email, string $class)
    {
        parent::__construct($id, $lastName, $firstName, $email, $class);
    }

}