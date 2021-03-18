
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
            <th>Class name</th>
            <th>Submit</th>
        </tr>
        <tr>
            <td><input type="text" name="firstName" value="<?php echo $student->getFirstname() ?>"/></td>
            <td><input type="text" name="lastName" value="<?php echo $student->getLastname() ?>"/></td>
            <td><input type="text" name="email" value="<?php echo $student->getEmail() ?>"/></td>
            <!-- creates whole list of class names-->
            <td>
                <select name="className">
                    <!-- doesnt work yet because of no existing groupController-->
                    <?php foreach (groupController::getAllGroups() as $group): ?>
                        <!-- checks which class from the generated list = the students class-->
                        <option value="<?php echo $group ?>" <?php if ($group === $student->getGroup()) {
                            echo 'selected';
                        } ?>><?php echo $group ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <form method="post" action="../index.php">
                    <!--  EDIT - save button -->
                    <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                    <input type="submit" name="save" value="Save" class="btn btn-danger"/>
                </form>
            </td>
        </tr>
    </table>
    <!--passing student ID back ->to refer to it with the new values-->
    <input type="hidden" name="studentID" value="<?php echo $student->getId() ?>"/>

</form>
</main>
<?php require "includes/footer.php" ?>
