<?php
require "includes/header.php"
?>

    <main class="container-fluid p-3">
        <form class="col-10 m-5 mx-auto" method="get" action="?page=students">
            <div class="form-row mt-2">
                <div class="col">
                    <label for="firstname"></label>
                    <input type="text" name="firstName" id="firstname" class="form-control" placeholder="Firstname">

                </div>
                <div class="col">
                    <label for="lastname"></label>
                    <input type="text" name="lastName" id="lastname" class="form-control" placeholder="Lastname">

                </div>
                <div class="col">
                    <label for="email"></label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email">

                </div>
                <div class="col">
                    <label for="classes">Classes</label>
                    <select name="className" id="classes">
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
                    <input type="submit" name="saveStudent" value="Save" class="btn btn-danger"/>
                </div>
            </div>
        </form>
    </main>

<?php require "includes/footer.php" ?>