<?php
declare(strict_types=1);

<<<<<<< HEAD
require "Loaders/studentLoader.php";
require "includes/header.php";
=======
>>>>>>> 790360f9c80f13c2292e8a7c54d2f26b5ad38415

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require 'includes/header.php';


?>

<main>

<!--check if data were SAVEd and alert succeeded changes -->
<?php if(isset($_POST ['save'])):?>
<?php studentLoader::saveStudent($_POST,$pdo)?>
    <div class="alert alert-success" role="alert">
        <?php echo 'Your changes have been saved.'?>
    </div>
<?php endif;?>

<!--DELETEs data-->
<?php if(isset($_POST ['delete'])):?>
<?php studentLoader::deleteStudent($_POST['id'],$pdo);
//redirect page
header( "refresh:3;url=../../index.php" );
?>
    <div class="alert alert-success" role="alert">
        <?php echo 'Delete successful.'?>
    </div>
<?php endif;?>

<!-- check if delete button was pressed, if yes => the table will not be visible -->
<?php if(!isset($_POST['delete'])):?>
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
            <td><a href="classView.php?className=<?php echo $student->getClass() ?>"><?php echo $student->getClass() ?></a></td>
            <td><a href="teacherView.php?teacherID=<?php echo $student->getTeacher() ?>"><?php echo $student->getTeacher() ?></a></td>
            <td>
                <form method="get" action="studentEdit.php">
                    <!-- edit button -->
                    <input type="hidden" name="id" value="<?php echo $student->getID()?>" />
                    <input type="submit"  value="Edit" class="btn btn-primary"/>
                </form>
                <form method="post">
                    <!-- delete button -->
                    <input type="hidden" name="id" value="<?php echo $student->getID()?>" />
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                </form>
            </td>
        </tr>
    </table>
</section>
<?php endif;?>
<<<<<<< HEAD
<?php require "includes/footer.php"; ?>
=======

</main>

<?php require 'includes/footer.php'; ?>
>>>>>>> 790360f9c80f13c2292e8a7c54d2f26b5ad38415
