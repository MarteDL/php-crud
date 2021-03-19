<?php require "includes/header.php"; ?>

<main>
    <table style="width:100%">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Classname</th>
            <th></th>
        </tr>
        <?php

        /** @var teacher[] $allTeachers */
        foreach ($allTeachers as $teacher): ?>
            <tr>
                <td>
                    <a href="?page=teachers&id=<?php echo $teacher->getId() ?>"
                       class=""><?php echo $teacher->getFirstname() ?>
                </td>
                <td>
                    <a href="?page=teachers&id=<?php echo $teacher->getId() ?>"
                       class=""><?php echo $teacher->getlastname() ?>
                </td>
                <td>
                    <a href="?page=groups&className=<?php echo $teacher->getGroup()->getName() ?>"><?php echo $teacher->getGroup()->getName() ?></a>
                </td>
                <td>
                    <form method="post" style="float: left"><!-- temporary styling-->
                        <!-- delete button -->
                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                        <button type="submit" name="export_button_teacher">Download File</button>
                    </form>
                    <!-- edit button -->
                    <a href="?page=teachers&edit=<?php echo $teacher->getId() ?>" class="btn btn-primary">Edit teacher</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr class="text-center">
            <!-- edit button -->
            <td>
                <a class="btn btn-primary" href="?page=teachers&create=create?>">Create new teacher</a>
            </td>
        </tr>
    </table>

</main>

<?php require "includes/footer.php"; ?>
