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
} else if (isset($_GET['page']) && $_GET['page'] === 'teachers') {
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
} else if (isset($_GET['page']) && $_GET['page'] === 'groups') {
    $controller = new GroupController();

    if (isset($_GET['className'])) {
        $controller->showGroupInfo((string)$_GET['className']);
    } // if URL shows EDIT -> shows EDIT page with a specific student -> checkEditStudent()
    else if (isset($_GET['edit'])) {
        $controller->goToEditGroup($_GET['edit']);

        if (isset($_POST['save'])) {
            $controller->editGroup($_POST, $_GET['edit']);
        }
    } else if (isset($_GET['create'])) {
        $controller->goToCreateGroup();
    } // if URL doesnt show any ID nor EDIT -> shows all students
    else {
        $controller->getAllGroupsInfo();
    }

} else if (isset($_GET['save'])) {
    $controller = new GroupController();
    $controller->createGroup($_GET);
} else if (isset($_POST['search_button'])) {
    $controller->searchStudentTeacher($_POST['search']);
} else {
    $controller->render();
}






//------------------- checks from student controller -------------------------
//$controller->checkSavedData();
//$controller->checkDeletedData();
//$controller->checkEditStudent();



