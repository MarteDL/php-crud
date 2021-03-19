<?php require 'includes/header.php'; ?>

<main>

    <!--table of detailed overview-->
    <section>
        <table style="width:100%">
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Teacher</th>
                <th></th>
            </tr>
            <tr>
                <td><?php echo $group->getName() ?></td>
                <td><?php echo $group->getLocation() ?></td>
                <td>
                    <a href="?page=teachers&id=<?php echo $group->getTeacher()->getLastName().' '.$group->getTeacher()->getFirstName() ?>"><?php echo $group->getTeacher()->getLastName().' '.$group->getTeacher()->getFirstName() ?></a>
                </td>
                <td>
                    <form method="post"><!-- temporary styling-->
                        <!-- delete button -->
                        <input type="hidden" name="className" value="<?php echo $group->getName() ?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                    </form>
                    <!-- edit button -->
                <td>
                    <a href="?page=groups&edit=<?php echo $group->getName() ?>" class="btn btn-primary">Edit Group</a>
                </td>
                </td>
            </tr>
            <tr>
                <th>Students</th>
            </tr>
            <?php foreach ($group->getStudents() as $student) : ?>
                <tr>
                    <td>
                        <a href="?page=students&id=<?php echo $student->getId() ?>"><?php echo $student->getFirstname().' '.$student->getlastname() ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

</main>

<?php require 'includes/footer.php'; ?>
