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
                <th>Class name</th>
                <th>Students</th>
                <th></th>
            </tr>
            <tr>
                <td><input type="text" name="firstName" value="<?php echo
                        /** @var teacher $teacher */
                    $teacher->getFirstname() ?>"/></td>
                <td><input type="text" name="lastName" value="<?php echo $teacher->getLastname() ?>"/></td>
                <td><input type="text" name="email" value="<?php echo $teacher->getEmail() ?>"/></td>
                <!-- creates whole list of class names-->
                <td>
                    <select name="className">
                        <?php
                        /** @var group[] $allGroups */
                        foreach ($allGroups as $group):
                            $groupName = $group->getName();
                            ?>
                            <option value="<?php echo $groupName ?>" <?php if ($groupName === $teacher->getGroup()->getName()) {
                                echo 'selected';
                            } ?>><?php echo $groupName ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <form method="post" action="../index.php">
                        <!--  EDIT - save button -->
                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                        <input type="submit" name="saveTeacher" value="Save" class="btn btn-danger"/>
                    </form>
                </td>
            </tr>
        </table>
    </form>
</main>
<?php require "includes/footer.php" ?>
