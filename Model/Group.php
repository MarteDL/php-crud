<?php


class group
{
    private string $name;
    private string $location;
    private teacher|null $teacher;
    private array $students;

    public function __construct(string $name, string $location = '', teacher|null $teacher = null, array $students = [])
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

    public function getTeacher(): teacher
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
     * @param teacher $teacher
     */
    public function setTeacher(teacher $teacher): void
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