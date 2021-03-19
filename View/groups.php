<?php require "includes/header.php"; ?>

    <main class="container-fluid  p-3">
        <table  class="col-10 m-5 mx-auto" style="width:100%" style="width:100%">
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
                        <a href="?page=teachers&id=<?php echo $group->getTeacher()->getId() ?>"><?php echo $group->getTeacher()->getLastName() . ' ' . $group->getTeacher()->getFirstName() ?></a>
                    </td>
                    <td>
                        <form method="post" style="float: left"><!-- temporary styling-->
                            <!-- delete button -->
                            <input type="hidden" name="className" value="<?php echo $group->getName() ?>"/>
                            <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                        </form>
                        <!-- edit button -->
                        <a href="?page=groups&edit=<?php echo $group->getName() ?>" class="btn btn-primary">Edit
                            class</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr class="text-center">
                <!-- create button -->
                <td>
                    <a class="btn btn-primary" href="?page=groups&create=<?php echo $group->getName() ?>">Create new class</a>
                    <button class="btn btn-primary" type="submit" name="export_button_group">Download File</button>
                </td>
            </tr>
        </table>

    </main>

<?php require "includes/footer.php"; ?>