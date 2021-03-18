<?php


require "includes/header.php";

?>

    <main>
        <section>
            <table style="width:100%">
                <?php if (isset($_POST ['save'])): ?>
                    <?php studentLoader::saveStudent($_POST, $pdo) ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo 'Your changes have been saved.' ?>
                    </div>
                <?php endif; ?>

                <!--        DELETEs data-->
                <?php if (isset($_POST ['delete'])): ?>
                    <?php studentLoader::deleteStudent($_POST['id'], $pdo);
                    //redirect page
                    header("refresh:3;url=../../index.php");
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo 'Delete successful.' ?>
                    </div>
                <?php endif; ?>

                <!--         check if delete button was pressed, if yes => the table will not be visible -->
                <?php if (!isset($_POST['delete'])): ?>
                <!--        table of detailed overview-->


                <table style="width:100%">

                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Class name</th>
                        <th>Teacher</th>
                        <th></th>
                    </tr>
                    <?php
                    /** @var student[] $allStudents */
                    foreach ($allStudents

                    as $student): ?>
                    <tr>
                        <td><a href="../index.php?id=<?php echo $student->getId() ?>"
                               class="btn "><?php echo $student->getFirstname() ?>
                        </td>
                        <td><a href="../index.php?id=<?php echo $student->getId() ?>"
                               class="btn "><?php echo $student->getLastName() ?>
                        </td>
                        <td><a href="classView.php?className=<?php echo $student->getGroup()->getName() ?>"><?php echo $student->getGroup() ?><</td>
                        <td>
                            <a href="classView.php?className=<?php echo $student->getGroup()->getName() ?>"><?php echo $student->getGroup()->getName() ?></a>
                        </td>

                        <td>
                            <a href="?id=<?php echo $student->getId() ?>" class="btn btn-primary">Update</a>
                            <form method="post">
                                <input type="hidden" name="id" value="<?php echo $student->getId() ?>"/>
                                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                        <?php endforeach; ?>
                        <?php endif; ?>
                </table>

        </section>
    </main>

<?php require "includes/footer.php"; ?>