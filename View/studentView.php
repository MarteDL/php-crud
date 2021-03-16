<?php
declare(strict_types=1);

require "Loaders/studentLoader.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$student = studentLoader::getStudent($_GET['id']);
?>

<section>
    <table style="width:100%">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Class name</th>
            <th>Teacher</th>
            <th></th>
        </tr>
        <tr>
            <td><?php echo $student->getFirstname() ?></td>
            <td><?php echo $student->getLastname()?></td>
            <td><?php echo $student->getEmail() ?></td>
            <td><a href="classView.php?className=<?php echo $student->getclassName() ?>"></td>
            <td><a href="teacherView.php?teacherID=<?php echo $student->getTeacher() ?>"</td>
            <td>
                <!-- in progress
                <form method="post">
                    <input type="hidden" value="<?php echo $student->getStudentID()?>" class="btn btn-primary"/>
                    <input type="submit" name="action" value="Edit" class="btn btn-danger"/>
                    <input type="submit" name="action" value="Delete" class="btn btn-danger"/>
                </form> -->
            </td>
        </tr>
    </table>
</section>

