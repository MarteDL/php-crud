<?php
require "includes/header.php"
?>

<main>
<!------------------- edit form ---------------------->
<form method="post" action="index.php">
    <table style="width:100%">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Class name</th>
            <!--<th>Teacher</th>-->
            <th></th>
        </tr>
        <tr><input type="text" name="firstName" value="<?php echo $student->getFirstname() ?>"/></tr>
        <tr><input type="text" name="lastName" value="<?php echo $student->getLastname() ?>"/></tr>
        <tr><input type="text" name="email" value="<?php echo $student->getEmail() ?>"/></tr>
        <!-- creates whole list of class names-->
        <tr><select name="className">
                <!-- checks which class from the generated list = the students class-->
                <option value="<?php echo $group ?>" <?php if ($group === $student->getGroup()) {
                    echo 'selected';
                } ?>><?php echo $group ?></option>
                <?php endforeach;?>
            </select>


        </tr> <!--drop down-->
        <!-- <tr><input disabled type="text"  name="teacher" value="  <?php /* echo $student->getTeacher() */ ?> "/></tr>-->
        <!--disabled-->
        <tr><input type="submit" name="save" value="Save" class="btn btn-danger"/></tr>
    </table>
    <!--passing student ID back ->to reffer to it with the new values-->
    <input type="hidden" name="studentID" value="<?php echo $student->getId() ?>"/>
</form>
</main>
<?php require "includes/footer.php" ?>
