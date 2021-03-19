<?php

declare(strict_types=1);


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php";

?>

    <main>
        <table style="width:100%">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Class</th>
            <th></th>
        </tr>
        <?php
        /** @var teacher[] $allStudents */
        foreach ($allStudents as $student): ?>
            <tr>
                <td>
                    <a href="?page=students&id=<?php echo $student->getId() ?>"
                       class=""><?php echo $student->getFirstname() ?>
                </td>
                <td>
                    <a href="?page=students&id=<?php echo $student->getId() ?>"
                       class=""><?php echo $student->getlastname() ?>
                </td>
                <td>
                    <a href="?page=groups&className=<?php echo $student->getGroup()->getName() ?>"><?php echo $student->getGroup()->getName() ?></a>
                </td>
                <td>
                    <form method="post" style="float: left"><!-- temporary styling-->
                        <!-- delete button -->
                        <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                        <button type="submit" name="export_button_student">Download File</button>
                    </form>
                    <!-- edit button -->
                    <a href="?page=students&edit=<?php echo $student->getId() ?>" class="btn btn-primary">Edit student</a>
                </td>
            </tr>
        <?php endforeach; ?>
            <tr class="text-center">
                <!-- edit button -->
                <td>
                    <a class="btn btn-primary" href="?page=students&create=create?>">Create new student</a>
                </td>
            </tr>
        </table>

    </main>

<?php require "includes/footer.php"; ?>