<?php

declare(strict_types=1);
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "Model/User.php";
require "Model/DbConnect.php";
require "Model/Student.php";
require "Model/Group.php";
require "Model/Teacher.php";
require "Loaders/studentLoader.php";
require "Loaders/teacherLoader.php";
require "Loaders/groupLoader.php";
require "Controller/HomepageController.php";
require "Controller/StudentController.php";
require "Controller/TeacherController.php";
require "Controller/GroupController.php";

$controller = new HomepageController();

if (isset($_GET['page']) && $_GET['page'] === 'students') {
    $controller = new StudentController();

//if URL shows ID -> shows student details
    if (isset($_GET['id'])) {
        $controller->showStudentInfo((int)$_GET['id']);
    }
// if URL doesnt show any ID nor EDIT -> shows all students
// if URL shows EDIT -> shows EDIT page with a specific student -> checkEditStudent()
    else if (!isset($_GET['edit'])) {
        $controller->getAllStudentInfo();
    }

    $controller->checkSavedData();
    $controller->checkDeletedData();
    $controller->checkEditStudent();
}
if (isset($_GET['page']) && $_GET['page'] === 'teachers') {
    $controller = new TeacherController();

//if URL shows ID -> shows student details
    if (isset($_GET['id'])) {
        $controller->showTeacherInfo((int)$_GET['id']);
    }
// if URL doesnt show any ID nor EDIT -> shows all students
// if URL shows EDIT -> shows EDIT page with a specific student -> checkEditStudent()
    else if (!isset($_GET['edit'])) {
        $controller->getAllTeachersInfo();
    }

    $controller->checkSavedData();
    $controller->checkDeletedData();
    $controller->checkEditTeacher();
}
if (isset($_GET['page']) && $_GET['page'] === 'groups') {
    $controller = new GroupController();

    if (isset($_GET['className'])) {
        $controller->showGroupInfo((string)$_GET['className']);
    }

// if URL doesnt show any ID nor EDIT -> shows all students
// if URL shows EDIT -> shows EDIT page with a specific student -> checkEditStudent()
    else if (!isset($_GET['edit'])) {
        $controller->getAllGroupsInfo();
    }

    $controller->checkSavedData();
    $controller->checkDeletedData();
    $controller->checkEditGroup();

}

else {
    $controller->render();
}





