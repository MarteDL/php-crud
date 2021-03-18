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
            /** @var group[] $allGroups */
            foreach ($allGroups as $group): ?>
                <tr>
                    <td>
                        <a href="?page=groups&className=<?php echo $group->getName() ?>"
                           class=""><?php echo $group->getName() ?>
                    </td>
                    <td>
                        <?php echo $group->getLocation() ?>
                    </td>
                    <td>
                        <a href="?page=teachers&id=<?php echo $group->getTeacher() ?>"><?php echo $group->getTeacher()?></a>
                    </td>
                    <td>
                        <form method="post" style="float: left"><!-- temporary styling-->
                            <!-- delete button -->
                            <input type="hidden" name="className" value="<?php echo $group->getName() ?>"/>
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                        </form>
                        <!-- edit button -->
                        <a href="?page=groups&edit=<?php echo $group->getName() ?>" class="btn btn-primary">Edit group</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </main>

<?php require "includes/footer.php"; ?>