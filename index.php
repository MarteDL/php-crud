<?php

declare(strict_types=1);
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require "Model/user.php";
require "Model/group.php";
require "Model/student.php";
require "Model/group.php";
require "Model/DbConnect.php";
require "Controller/StudentController.php";
require "Loaders/studentLoader.php";



$controller = new StudentController();

//if URL shows ID -> shows student details
if(isset($_GET['id']) ) {
    $controller->showStudentInfo((int) $_GET['id']);
}
// if URL doesnt show any ID nor EDIT -> shows all students
// if URL shows EDIT -> shows EDIT page with a specific student -> checkEditStudent()
else if (!isset($_GET['edit'])){
    $controller->getAllStudentInfo();
}

//------------------- checks from student controller -------------------------
$controller->checkSavedData();
$controller->checkDeletedData();
$controller->checkEditStudent();