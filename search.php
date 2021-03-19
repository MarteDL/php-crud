<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'View/includes/header.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>School of many</title>
    <meta name="author" content="Marte, Micha, Jens, Anton">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="School">
    <meta property="og:type" content="School of many">
    <meta property="og:url" content="../img/logo.jpeg">
    <meta property="og:image" content="img/logo.jpeg">

    <link rel="icon" type="imgage/png" href="img/logo.png">
    <link rel="apple-touch-icon" href="img/logo.png">


    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <meta name="theme-col p-2or" content="#fafafa">

</head>
<body>
    <!-- Still bugs, only teacher data is showing-->
        <?php
if (count($results) > 0) {
    foreach ($results as $result) {
        echo "<div class='search_results'><p>".implode(', ', $result)."</p></div>";
            }
        } else {
            echo "No matching results found";
        } ?>
<!--<a href="?page=students&id=<?php //echo $results['studentID']?>-->

</body>

<!--<div>
<table class='search_table'>
<tr>
<td><h3>Student</h3></td>
</tr>
<tr>
<td>".$result['studentFirstName']." </td>
<td>".$result['studentlastName']." </td>
<td>".$result['studentEmail']." </td>
<td>".$result['studentClassName']." </td>
</tr>
<tr>
<td><h3>Teacher</h3></td>
</tr>
<tr>
<td>".$result['firstName']." </td>
<td>".$result['lastName']." </td>
<td>".$result['email']." </td>
<td>".$result['className']." </td>
</tr>
</table>
</div>
-->