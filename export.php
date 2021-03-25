<?php

class export
{
    private function exportCsv(array $array) : void {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "wb");

        fputcsv($output, $array);

        fclose($output);
    }

    public static function exportCSV_student($pdo)
    {
        $studentArray = studentLoader::getAllStudents($pdo);
        self::exportCsv($studentArray('studentID', 'firstName', 'lastName', 'email', 'className'));

    }
    public static function exportCSV_teacher($pdo)
    {
        $teacherArray = teacherLoader::getAllTeachers($pdo);
        self::exportCsv([$teacherArray['teacherID'], $teacherArray['firstName'], $teacherArray['lastName'], $teacherArray['email'], $teacherArray['export']]);
    }

    public static function exportCSV_group($pdo)
    {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "wb");
        $groupArray = groupLoader::getAllGroups($pdo);

        fputcsv($output, $groupArray('name', 'location', 'teacherID'));

        fclose($output);

    }

}
