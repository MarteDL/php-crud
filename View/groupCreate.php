<?php
require "includes/header.php"
?>

    <main class="container-fluid  p-3">
        <form class="col-10 m-5 mx-auto" style="width:100%" method="get" action="?page=groups">
            <div class="form-row mt-2">
                <div class="col">
                    <label for="name"></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">

                </div>
                <div class="col">
                    <label for="location"></label>
                    <input type="text" name="location" id="location" class="form-control" placeholder="Location">

                </div>
                <div class="col">
                    <label for="teacher">Teacher</label>
                    <select name="teacherId" id="teacher">
                        <?php foreach ($teachers as $teacher) : ?>
                            <option value="<?php echo $teacher->getId() ?>"><?php echo $teacher->getLastName().' '.$teacher->getFirstName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mt-2">
                    <input type="submit" name="saveGroup" value="Save" class="btn btn-danger"/>
                </div>
            </div>
        </form>
    </main>

<?php require "includes/footer.php" ?>