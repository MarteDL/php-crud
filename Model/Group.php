<?php


class group
{
    private string $name;
    private string $location;
    private string $teacher;

    public function __construct(string $name, string $location = '', string $teacher = '')
    {
        $this->name = $name;
        $this->location = $location;
        $this->teacher = $teacher;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTeacher(): string
    {
        return $this->teacher;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

}