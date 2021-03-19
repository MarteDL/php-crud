<?php
require "includes/header.php"
?>

<main class="container-fluid">
    <form method="get" action="?page=teachers">
        <div class="form-row mt-2">
            <div class="col">
                <label for="firstName"></label>
                <input type="text" name="firstName" id="firstname" class="form-control" placeholder="Firstname">

            </div>
            <div class="col">
                <label for="lastName"></label>
                <input type="text" name="lastName" id="lastname" class="form-control" placeholder="Lastname">

            </div>
            <div class="col">
                <label for="email"></label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Email">

            </div>
            <div class="col">
                <label for="classes">Class</label>
                <select name="className" id="classes">
                    <option value="<?php echo null ?>"> </option>
                    <?php
                        /** @var group[] $groups */
                        /** @var student $student */
                        foreach ($groups as $group):
                            $groupName = $group->getName();
                            ?>
                    <option value="<?php echo $groupName ?>"><?php echo $groupName ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-2">
                <input type="submit" name="saveTeacher" value="Save" class="btn btn-danger"/>
            </div>
        </div>
    </form>
</main>

<?php require "includes/footer.php" ?>