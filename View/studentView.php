<?php
require 'includes/header.php';
?>

<main class="container-fluid">

<!--table of detailed overview-->
<section>
    <table style="width:100%">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Class name</th>
            <th>Teacher</th>
            <th></th>
        </tr>
        <tr>
            <td><?php echo $student->getFirstname() ?></td>
            <td><?php echo $student->getLastname()?></td>
            <td><?php echo $student->getEmail() ?></td>
            <td><a href="?page=groups&className=<?php echo $student->getGroup()->getName() ?>"><?php echo $student->getGroup()->getName() ?></a></td>
            <td><a href="?page=teachers&id=<?php echo $student->getTeacher() ?>"><?php echo $student->getTeacher() ?></a></td>
            <td>
            <td>
                <form method="post" ><!-- temporary styling-->
                    <!-- delete button -->
                    <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger"/>
                </form>
                <!-- edit button -->
                <a href="?page=students&edit=<?php echo $student->getId() ?>" class="btn btn-primary" >Edit student</a>
            </td>
        </tr>
    </table>
</section>

</main>

<?php require 'includes/footer.php'; ?>
