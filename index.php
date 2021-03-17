<?php

declare(strict_types=1);
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require "Model/student.php";
require "Controller/StudentController.php";

$controller = new StudentController();

if(isset($_GET['id'])) {
    $controller->getStudentInfo($_GET['id']);
}

else {
    $controller->getAllStudentInfo();
}
