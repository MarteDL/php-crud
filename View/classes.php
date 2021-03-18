<?php require "includes/header.php"; ?>

<main>
    <tbody>
    <?php
    /** @var group[] $allGroups */
    foreach ($allGroups as $group): ?>
        <tr>
            <td><a href="?page=teachers&id=<?php echo $group->getId() ?>"
                   class="btn btn-primary"><?php echo $group->getFirstname(), $group->getlastname() ?>
            </td>
            <td><a href="classView.php?className=<?php echo $group->getGroup()->getName() ?>"></td>
            <td>
                <a href="?edit=<?php echo $group->getId() ?>" class="btn btn-primary">Edit teacher</a>

                <form method="get" action="teacherEdit.php">
                    <!-- edit button -->
                    <input type="hidden" name="edit" value="<?php echo $group->getId() ?>"/>
                    <input type="submit" value="Edit" class="btn btn-primary"/>
                </form>
                <form method="post">
                    <!-- delete button -->
                    <input type="hidden" name="id" value="<?php echo $group->getId() ?>"/>
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                </form>
            </td>
        <tr>
            <a href="?id=<?php echo $group->getId() ?>" class="btn btn-primary">Update</a>
        </tr>
        <td>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $group->getId() ?>"/>
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
        </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</main>

<?php require "includes/footer.php";


