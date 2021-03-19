<?php


class user
{
    private int|null $id;
    private string $lastName;
    private string $firstName;
    private string $email;
    private group|null $group;

    public function __construct(string $lastName, string $firstName, string $email, group|null $group, int $id = null) {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->group = $group;
        $this->id = $id;

    }

    public function getId():? int
    {
        return $this->id;
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

    public function getGroup(): group
    {
        return $this->group;
    }

    public function setGroup(group $group): void
    {
        $this->group = $group;
    }

}