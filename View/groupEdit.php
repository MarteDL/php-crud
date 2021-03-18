<?php
require "includes/header.php"
?>

<main>
    <!------------------- edit form ---------------------->
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $group->getName() ?>"/>
        <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $group->getName() ?>"/>
        <label for="location">Location</label>
            <input type="text" name="location" value="<?php echo $group->getLocation() ?>"/>
        <label for="teacher">Teacher</label>
            <input type="text" name="teacher" id="teacher" value="<?php echo $group->getTeacher() ?>"/>
        <!--  EDIT - save button -->
        <input type="submit" name="save" value="Save" class="btn btn-danger"/>
        <!--passing group name back ->to refer to it with the new values-->
        <input type="hidden" name="className" value="<?php echo $group->getName() ?>"/>

    </form>
</main>
<?php require "includes/footer.php" ?>
