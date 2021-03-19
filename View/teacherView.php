<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'includes/header.php';
?>

<main class="container-fluid  p-3">
    <!--table of detailed overview-->
    <section>
        <table class="col-10 m-5 mx-auto" style="width:100%">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Class name</th>
                <th>Assigned students</th>
                <th></th>
            </tr>
            <tr>
                <td><?php echo /** @var teacher $teacher */
                    $teacher->getFirstname() ?></td>
                <td><?php echo $teacher->getLastname() ?></td>
                <td><?php echo $teacher->getEmail() ?></td>
                <td>
                    <a href="?page=groups&className=<?php echo $teacher->getGroup()->getName() ?>"><?php echo $teacher->getGroup()->getName() ?></a>
                </td>
                <td>
                    <?php
                    foreach ($teacher->getStudents() as $student): ?>
                        <a href="?page=students&id=<?php echo $student->getId() ?>"
                           ><?php echo $student->getFirstname(), $student->getlastname(); ?></a>
                        <br>
                    <?php endforeach; ?>
                </td>
                <td>
                    <!-- edit button -->
                    <a href="?page=teachers&edit=<?php echo $teacher->getId() ?>" class="btn btn-secondary">Edit teacher</a>
                    <form method="post"><!-- temporary styling-->
                        <!-- delete button -->
                        <input type="hidden" name="id" value="<?php echo $teacher->getId() ?>"/>
                        <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                    </form>
                </td>
            </tr>
        </table>
    </section>

</main>
<?php require 'includes/footer.php'; ?>

