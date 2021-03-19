<?php

class export
{

    public static function exportCSV_student($pdo)
    {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "wb");
        $studentArray = studentLoader::getAllStudents($pdo);

        fputcsv($output, $studentArray('studentID', 'firstName', 'lastName', 'email', 'className'));

        fclose($output);

    }
    public static function exportCSV_teacher($pdo)
    {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output = fopen("php://output", "wb");
        $teacherArray = teacherLoader::getAllTeachers($pdo);

        fputcsv($output, $teacherArray('teacherID', 'firstName', 'lastName', 'email', 'className'));

        fclose($output);

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
