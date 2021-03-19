<?php
require "includes/header.php"
?>

<main>
    <!------------------- edit form ---------------------->
    <form method="post">
        <label for="name">Name </label>
            <input type="text" name="name" id="name" value="<?php echo $group->getName() ?>"/>
        <label for="location">Location </label>
            <input type="text" name="location" value="<?php echo $group->getLocation() ?>"/>
        <label for="teacher">Teacher </label>
            <input type="text" name="teacher" id="teacher" value="<?php echo $group->getTeacher() ?>"/>
        <label for="teacher">Teacher</label>
        <select name="teacherId" id="teacher">
            <?php foreach ($teachers as $teacher) : ?>
                <option value="<?php echo $teacher->getId() ?>"><?php echo $teacher->getLastName().' '.$teacher->getFirstName() ?></option>
            <?php endforeach; ?>
        </select>
        <!--  EDIT - save button -->
        <input type="submit" name="save" value="Save" class="btn btn-danger"/>
        <!--passing group name back ->to refer to it with the new values-->
        <input type="hidden" name="className" value="<?php echo $group->getName() ?>"/>

    </form>
</main>
<?php require "includes/footer.php" ?>

