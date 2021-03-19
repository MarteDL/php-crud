<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if (isset($_POST['submit'])) {
    $newTeacher = new TeacherController();
    if (!empty($_POST['firstName']&& $_POST['lastName']&& $_POST['email']&& $_POST['className'])) {
        $newTeacher->createNewTeacher();
        header("Location:index.php");
        exit;
    }else{
        $error= "You must fill in all the fields ";
    }
}else  header("Location:index.php");
?>
<form method="post" action="index.php">
    <table style="width:100%"> <!-- temporary styling-->
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Class name</th>
            <th>Submit</th>
        </tr>
        <tr>
            <td><input type="text" name="street" id="firstName" class="form-control"
                       value="<?php echo isset($_POST['firstName']) ? $_SESSION['firstName'] : ''; ?>">
                <span style="color : red"><?php echo $error ?></span></td>
            <td><input type="text" name="street" id="firstName" class="form-control"
                       value="<?php echo isset($_POST['lastName']) ? $_SESSION['lastName'] : ''; ?>">
                <span style="color : red"><?php echo $error ?></span></td>
            <td><input type="text" name="street" id="firstName" class="form-control"
                       value="<?php echo isset($_POST['email']) ? $_SESSION['email'] : ''; ?>">
                <span style="color : red"><?php echo $error ?></span></td>
            <td><input type="text" name="street" id="firstName" class="form-control"
                       value="<?php echo isset($_POST['className']) ? $_SESSION['className'] : ''; ?>">
                <span style="color : red"><?php echo $error ?></span></td>
            <!-- creates whole list of class names-->
            <td> <button type="submit" class="btn btn-primary"  >Submit</button>
        </tr>
    </table>

</form>