<?php


class user
{
    protected int $id;
    protected string $lastName;
    protected string $firstName;
    protected string $email;
    protected string $class;

    public function __construct(string $lastName, string $firstName, string $email, string $class, int $id = 0) {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->class = $class;

        if ($id !== 0) {
            $this->id = $id;
        }
    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getFirstName(): string
    {
        return $this->firstName;
    }


    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }


    public function getLastName(): string
    {
        return $this->lastName;
    }


    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }


    public function getClass(): string
    {
        return $this->class;
    }


    public function setClass(string $class): void
    {
        $this->class = $class;
    }

}