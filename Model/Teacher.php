<?php




class teacher extends user
{
    /** @var teacher[] */
    private array $students;


    public function __construct(string $lastName, string $firstName, string $email, group|null $group, int $id = 0)
    {
        parent::__construct($lastName, $firstName, $email, $group, $id);

              if ($students !== null) {
            $this->students = $students;
        }

    }

    public function getStudents(): array
    {
        return $this->students;

    }

}