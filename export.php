<?php
$connection = new DbConnect();
public function exportcsv(PDO $pdo){
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('studentID', 'firstName', 'lastName', 'email', 'className'));
    $handle = $pdo->prepare("SELECT * FROM student");
    $handle->execute();
    $result = $handle->fetchAll();
}
