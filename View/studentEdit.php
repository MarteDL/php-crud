<?php
declare(strict_types=1);

require "Loaders/studentLoader.php";
require "Controller/groupController.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$student = studentLoader::getStudent($_GET['id'],$pdo);
?>
<!------------------- edit form ---------------------->
<form method="post" action="studentView.php">
        <table style="width:100%">
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Class name</th>
            <!--<th>Teacher</th>-->
                <th></th>
            </tr>
            <tr><input type="text"  name="firstName" value="<?php echo $student->getFirstname() ?>"/></tr>
            <tr><input type="text"  name="lastName" value="<?php echo $student->getLastname() ?>"/></tr>
            <tr><input type="text"  name="email" value="<?php echo $student->getEmail() ?>"/></tr>
            <!-- creates whole list of class names-->
            <tr><select  name="className">
                    <?php foreach(groupController::getAllGroups() as $group):?>
                        <!-- checks which class from the generated list = the students class-->
                        <option value="<?php echo $group?>" <?php if($group===$student->getClass()){echo 'selected';} ?>><?php echo $group?></option>
                    <?php endforeach;?>
                </select>


            </tr> <!--drop down-->
        <!-- <tr><input disabled type="text"  name="teacher" value="  <?php/* echo $student->getTeacher() */?> "/></tr>--> <!--disabled-->
            <tr><input type="submit"  name="save" value="Save" class="btn btn-danger"/></tr>
        </table>
    <!--passing student ID back ->to reffer to it with the new values-->
    <input type="hidden" name="studentID" value="<?php $_GET['id']?>"/>
    </form>