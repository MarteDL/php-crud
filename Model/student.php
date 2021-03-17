<?php


use JetBrains\PhpStorm\Pure;

class student extends teacher
{
    private string $class = '';

     #[Pure] public function  __construct($lastName, $firstName, $email, $class = null) {
         parent::__construct($lastName, $firstName, $email);

         if ($class !== null) {
             $this->class = $class;
         }
     }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param string $class
     */
    public function setClass(string $class): void
    {
        $this->class = $class;
    }

}