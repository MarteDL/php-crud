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
require "Controller/HomepageController.php";
require "Controller/StudentController.php";
require "Controller/TeacherController.php";
//require "View/studentEdit.php";

$controller = new HomepageController();

// go to homepage if we haven't clicked any page yet
if (!isset($_GET['page'])) {
    $controller->render($_GET);
}

// go to any page with students
else if ($_GET['page'] === 'students') {

    $controller = new StudentController();

    if (isset($_GET['id'])) {
        $controller->getStudentInfo($_GET['id']);
    } else {
        $controller->getAllStudentInfo();
    }
}

// go to teacher pages
else if ($_GET['page'] === 'teachers') {

    $controller = new TeacherController();

    if (isset($_GET['id'])) {
        $controller->getTeacherInfo($_GET['id']);
    }
    else {
        $controller->getAllTeachersInfo();
    }
}

// go to class pages
else if ($_GET['page'] === 'groups') {

    $controller = new GroupController();

    if (isset($_GET['className'])) {
        $controller->getGroupInfo($_GET['className']);
    }
}