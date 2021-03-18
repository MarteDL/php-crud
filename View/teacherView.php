
<?php require 'includes/header.php'; ?>

<main>
    <!--table of detailed overview-->
    <section>
        <table style="width:100%">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Class name</th>
                <th>Assigned students</th>
                <th></th>
            </tr>
            <tr>
                <td><?php echo $teacher->getFirstname() ?></td>
                <td><?php echo $teacher->getLastname() ?></td>
                <td><?php echo $teacher->getEmail() ?></td>
                <td>
                    <a href="?page=groups&className=<?php echo $teacher->getGroup()->getName() ?>"><?php echo $teacher->getGroup()->getName() ?></a>
                </td>
                <td><div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Assigned students
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php
                            foreach ($teacher->getAllStudentsOfGroup() as $student): ?>
                            <a href="?page=students&id=<?php echo $student->getId() ?>"
                               class=""><?php echo $student->getFirstname(),$student->getlastname() ; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </td>
                <td>
                <td>
                    <!-- edit button -->
                    <a href="?page=students&edit=<?php echo $teacher->getId() ?>" class="btn btn-primary">Edit
                        student</a>
                    <form method="post"><!-- temporary styling-->
                        <!-- delete button -->
                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                    </form>
                </td>
                </td>
            </tr>
        </table>
    </section>

</main>
<?php require 'includes/footer.php'; ?>

