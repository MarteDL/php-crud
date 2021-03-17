<?php

declare(strict_types=1);
require "View/includes/header.php";

?>


    <tbody>
    <?php foreach($students AS $student):?>
        <tr>

            <td><?php echo htmlspecialchars($student->firstname),htmlspecialchars($student->lastname)?></td>
            <td><?php echo htmlspecialchars($student->lastname)?></td>
            <td>
                <a href="?id=<?php echo $student['id']?>" class="btn btn-primary">Update</a>
            </td>
            <td>
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $student->id ?>" />
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>


<?php  require "View/includes/footer.php"; ?>