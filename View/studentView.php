<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'includes/header.php';
?>

<main>

<!--table of detailed overview-->
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
            <td><a href="classView.php?className=<?php echo $student->getGroup()->getName() ?>"><?php echo $student->getGroup()->getName() ?></a></td>
            <td><a href="teacherView.php?teacherID=<?php echo $student->getTeacher() ?>"><?php echo $student->getTeacher() ?></a></td>
            <td>
            <td>
                <form method="post" ><!-- temporary styling-->
                    <!-- delete button -->
                    <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                </form>
                <!-- edit button -->
                <a href="index.php?edit=<?php echo $student->getId() ?>" class="btn btn-primary" >Edit student</a>
            </td>
        </tr>
    </table>
</section>

</main>

<?php require 'includes/footer.php'; ?>
