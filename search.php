<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'View/includes/header.php';
?>
<!-- Still bugs, only teacher data is showing-->
<div>
    <h3><?php var_dump($results);
        if (count($results) > 0) {
            foreach ($results as $result) {
                echo implode(', ', $result);
            }
        } else {
            echo "No matching results found";
        } ?>
    </h3>
</div>
