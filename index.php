<?php

declare(strict_types=1);

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
    } else if (isset($_GET['create'])) {
        $controller->goToCreateStudent($_GET);
    } // if URL doesnt show any ID nor EDIT -> shows all students
    else if (!isset($_GET['edit'])) {
        $controller->getAllStudentInfo();
    }
}

if (isset($_GET['page']) && $_GET['page'] === 'teachers') {
    $controller = new TeacherController();
    $controller->checkEditTeacher();
    $controller->checkRemoveTeacher();
    if (isset($_GET['id'])) {
        $controller->showTeacherInfo((int)$_GET['id']);
    } else if (isset($_GET['create'])) {
        $controller->goToCreateTeacher();
    } else {
        $controller->getAllTeachersInfo();
    }
}

if (isset($_GET['page']) && $_GET['page'] === 'groups') {
    $controller = new GroupController();
    $controller->checkRemoveGroup();

    if (isset($_GET['className'])) {
        $controller->showGroupInfo((string)$_GET['className']);
    } // if URL shows EDIT -> shows EDIT page with a specific student -> checkEditStudent()
    else if (isset($_GET['edit'])) {
            $controller->goToEditGroup($_GET['edit']);
    } else if (isset($_GET['create'])) {
        $controller->goToCreateGroup();
    } // if URL doesnt show any ID nor EDIT -> shows all students
    else {
        $controller->getAllGroupsInfo();
    }
}

if (isset($_POST['search_button'])) {
    $controller = new StudentController();
    $controller->searchStudentTeacher($_POST['search']);
    $controller = new Studentcontroller();
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
}
if (isset($_GET['saveStudent'])) {
    $controller = new StudentController();
    $controller->createNewStudent($_GET);
}
if (isset($_GET['saveTeacher'])) {
    $controller = new TeacherController();
    $controller->createNewTeacher($_GET);
}
if (isset($_GET['saveGroup'])) {
    $controller = new GroupController();
    $controller->createGroup($_GET);
}


if (isset($_POST['export_button_student'])){
    $controller = new StudentController();
    $controller->exportingData();
}
if (isset($_POST['export_button_teacher'])){
    $controller = new StudentController();
    $controller->exportingData();
}
if (isset($_POST['export_button_group'])){
    $controller = new StudentController();
    $controller->exportingData();
}

if (empty($_GET)) {
    $controller = new HomepageController();
    $controller->render();
}