<?php
require_once "studentCreate.php";
require_once "../Loaders/studentLoader.php";
require_once "studentEdit.php";
require "../View/includes/header.php";
$students = studentLoader::getAllStudents();
?>

<?php if (isset($_POST ['save'])): ?>
    <?php studentLoader::saveStudent($_POST, $pdo) ?>
    <div class="alert alert-success" role="alert">
        <?php echo 'Your changes have been saved.' ?>
    </div>
<?php endif; ?>

    <!--DELETEs data-->
<?php if (isset($_POST ['delete'])): ?>
    <?php studentLoader::deleteStudent($_POST['id'], $pdo);
//redirect page
    header("refresh:3;url=../../index.php");
    ?>
    <div class="alert alert-success" role="alert">
        <?php echo 'Delete successful.' ?>
    </div>
<?php endif; ?>

    <!-- check if delete button was pressed, if yes => the table will not be visible -->
<?php if (!isset($_POST['delete'])): ?>
    <!--table of detailed overview-->


        <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
            <td><a href="?id=<?php echo $student->getStudent() ?>"
                   class="btn btn-primary"><?php echo $student->getFirstname(),$student->getlastname() ?>
            </td>
            <td><a href="classView.php?className=<?php echo $student->getClass() ?>"></td>
            <td>
                <form method="get" action="studentEdit.php">
                    <!-- edit button -->
                    <input type="hidden" name="id" value="<?php echo $student->getID() ?>"/>
                    <input type="submit" value="Edit" class="btn btn-primary"/>
                </form>
                <form method="post">
                    <!-- delete button -->
                    <input type="hidden" name="id" value="<?php echo $student->getID() ?>"/>
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                </form>
            </td>
            <tr>
                <a href="?id=<?php echo $student->getStudent() ?>" class="btn btn-primary">Update</a>
            </tr>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $student->id ?>"/>
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>


    <?php  endif;
require "../View/includes/footer.php"; ?>