<?php require "includes/header.php"; ?>

<main>
    <table style="width:100%">
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Teacher</th>
            <th></th>
        </tr>
        <?php
        //in progress -debugging
        /** @var group[] $allTeachers */
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
                    <a href="?page=teachers&className=<?php echo $teacher->getGroup()->getName() ?>"><?php echo $teacher->getGroup()->getName() ?></a>
                </td>
                <td>
                    <form method="post" style="float: left"><!-- temporary styling-->
                        <!-- delete button -->
                        <input type="hidden" name="id" value="<?php echo $teacher->getName() ?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                    </form>
                    <!-- edit button -->
                    <a href="?page=teachers&edit=<?php echo $teacher->getName() ?>" class="btn btn-primary">Edit group</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</main>

<?php require "includes/footer.php"; ?>
