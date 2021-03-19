<?php
require "includes/header.php"
?>

<main class="container-fluid  p-3">
    <!------------------- edit form ---------------------->
    <form class="col-10 m-5 mx-auto" style="width:100%" method="get">
        <label for="name">Name </label>
            <input type="text" name="name" id="name" value="<?php echo $group->getName() ?>" readonly>
        <label for="location">Location </label>
            <input type="text" name="location" value="<?php echo $group->getLocation() ?>"/>
        <label for="teacher">Teacher</label>
        <select name="teacherId" id="teacher">
            <option value="<?php echo $group->getTeacher()->getId() ?>"><?php echo $group->getTeacher()->getLastName().' '.$group->getTeacher()->getFirstName() ?></option>
            <?php foreach ($teachers as $teacher) : ?>
                <option value="<?php echo $teacher->getId() ?>"><?php echo $teacher->getLastName().' '.$teacher->getFirstName() ?></option>
            <?php endforeach; ?>
        </select>
        <!--  EDIT - save button -->
        <input type="submit" name="saveGroup" value="Save" class="btn btn-danger"/>
        <!--passing group name back ->to refer to it with the new values-->
        <input type="hidden" name="className" value="<?php echo $group->getName() ?>"/>
    </form>
</main>
<?php require "includes/footer.php" ?>

