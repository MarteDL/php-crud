<?php
require "includes/header.php"
?>

<main>
    <!------------------- edit form ---------------------->
    <form method="post" action="index.php">
        <table style="width:100%"> <!-- temporary styling-->
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Teacher</th>
                <th>Submit</th>
            </tr>
            <tr>
                <td><input type="text" name="name" value="<?php echo $group->getName() ?>"/></td>
                <td><input type="text" name="location" value="<?php echo $group->getLocation() ?>"/></td>
                <td><input type="text" name="teacher" value="<?php echo $group->getTeacher() ?>"/></td>
                <td>
                    <form method="post" action="../index.php">
                        <!--  EDIT - save button -->
                        <input type="hidden" name="id" value="<?php echo $group->getName() ?>"/>
                        <input type="submit" name="save" value="Save" class="btn btn-danger"/>
                    </form>
                </td>
            </tr>
        </table>
        <!--passing group name back ->to refer to it with the new values-->
        <input type="hidden" name="className" value="<?php echo $group->getName() ?>"/>

    </form>
</main>
<?php require "includes/footer.php" ?>

