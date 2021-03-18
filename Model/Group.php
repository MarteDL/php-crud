<?php


class group
{
    private string $name;
    private string $location;
    private string $teacher;
    private array $students;

    public function __construct(string $name, string $location = '', string $teacher = '', array $students = [])
    {
        $this->name = $name;
        $this->location = $location;
        $this->teacher = $teacher;
        $this->students = $students;
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

    /**
     * @return array
     */
    public function getStudents(): array
    {
        return $this->students;
    }

    /**
     * @param string $teacher
     */
    public function setTeacher(string $teacher): void
    {
        $this->teacher = $teacher;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

}