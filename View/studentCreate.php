<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
?>

<?php
require "includes/header.php"
?>

<main class="container-fluid">
    <form method="get" action="?page=groups">
        <div class="form-row mt-2">
            <div class="col">
                <label for="Firstname"></label>
                <input type="text" name="name" id="firstname" class="form-control" placeholder="Firstname">

            </div>
            <div class="col">
                <label for="Lastname"></label>
                <input type="text" name="location" id="lastname" class="form-control" placeholder="Lastname">

            </div>
            <div class="col">
                <label for="Email"></label>
                <input type="text" name="location" id="email" class="form-control" placeholder="Email">

            </div>
            <div class="col">
                <label for="student">Classes</label>
                    <select name="className">
                        <?php
                        /** @var group[] $groups */
                        /** @var student $student */
                        foreach ($groups as $group):
                            $groupName = $group->getName();
                            ?>
                            <option value="<?php echo $groupName ?>" <?php if ($groupName === $student->getGroup()->getName()) {
                                echo 'selected';
                            } ?>><?php echo $groupName ?></option>
                        <?php endforeach; ?>
                    </select>
            </div>
            <div class="mt-2">
                <input type="submit" name="studentSave" value="Save" class="btn btn-danger"/>
            </div>
        </div>
    </form>
</main>

<?php require "includes/footer.php" ?>
