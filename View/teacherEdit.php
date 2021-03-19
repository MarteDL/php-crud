<?php
require "includes/header.php"
?>

<main>
    <!------------------- edit form ---------------------->
    <form method="post" action="index.php">
        <table style="width:100%"> <!-- temporary styling-->
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Assigned students</th>
                <th></th>
            </tr>
            <tr>
                <td><input type="text" name="firstName" value="<?php echo
                        /** @var teacher $teacher */
                    $teacher->getFirstname() ?>"/></td>
                <td><input type="text" name="lastName" value="<?php echo $teacher->getLastname() ?>"/></td>
                <td><input type="text" name="email" value="<?php echo $teacher->getEmail() ?>"/></td>


                <td>
                    <?php
                    foreach ($teacher->getStudents() as $student): ?>
                        <a href="?page=students&id=<?php echo $student->getId() ?>"
                           ><?php echo $student->getFirstname(), $student->getlastname(); ?></a>
                        <br>
                    <?php endforeach; ?>
                </td>
                <td>
                    <form method="post" action="../index.php">
                        <!--  EDIT - save button -->
                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                        <input type="hidden" name="className" value="<?php echo $teacher->getGroup()->getName() ?>">
                        <input type="submit" name="saveTeacher" value="Save" class="btn btn-danger"/>
                    </form>
                </td>
            </tr>
        </table>
    </form>
</main>
<?php require "includes/footer.php" ?>
