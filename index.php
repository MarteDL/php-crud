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

//-------------------- please DO NOT REMOVE OR CHANGE -> essential for button functioning -------------------
if (isset($_GET['page']) && $_GET['page'] === 'students') {
    $controller = new StudentController();
    $controller->checkEditStudent();
    $controller->checkRemoveStudent();
    if (isset($_GET['id'])) {
        $controller->showStudentInfo((int)$_GET['id']);
    } else if (!isset($_GET['edit'])) {
        $controller->getAllStudentInfo();
    }

}
if (isset($_GET['page']) && $_GET['page'] === 'teachers') {
    $controller = new TeacherController();
    $controller->checkEditTeacher();
    $controller->checkRemoveTeacher();
    if (isset($_GET['id'])) {
        $controller->showTeacherInfo((int)$_GET['id']);
    } else if (!isset($_GET['edit'])) {
        $controller->getAllTeachersInfo();
    }
}
if (isset($_POST['search_button'])) {
    $controller->searchStudentTeacher($_POST['search']);
} else {
    if (isset($_POST['saveStudent'])) {
        $controller = new StudentController();
        $controller->saveData();
    }
    if (isset($_POST['saveTeacher'])) {
        $controller = new TeacherController();
        $controller->saveData();
    }
    if (isset($_POST['saveGroup'])) {
        $controller = new GroupController();
        $controller->checkSavedData();
    }
    $controller = new HomepageController();
    $controller->render();
}


//------------------------------------------------------------------------ group conditions -to be edited
if (isset($_GET['page']) && $_GET['page'] === 'groups') {
    $controller = new GroupController();

    if (isset($_GET['className'])) {
        $controller->showGroupInfo((string)$_GET['className']);
    } else if (isset($_GET['edit'])) {
        var_dump($_GET);
        $controller->editGroup($_GET['edit']);
    }
    else {
        $controller->getAllGroupsInfo();
    }

    $controller->checkSavedData();
    $controller->checkDeletedData();
    $controller->checkEditGroup();

}



