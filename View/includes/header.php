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


    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <meta name="theme-col p-2or" content="#fafafa">

</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">School of many</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-item nav-link active" href="?">Home <span class="sr-only">(current)</span></a>
                </li>
                <li><a class="nav-item nav-link" href="?page=students">Students</a></li>
                <li><a class="nav-item nav-link" href="?page=teachers">Teachers</a></li>
                <li><a class="nav-item nav-link" href="?page=groups">Classes</a></li>
            </ul>
            <form method="post" class="search_field form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search...">
                <button type="submit" name="search_button" class="btn btn-outline-primary my-2 my-sm-0">SEARCH</button>
            </form>
        </div>
    </nav>
    <!--
    <div class="row" id="School of many">
        <h1 class="mx-auto titlecaption ">School of many<img src="img/logo.png" alt="Logo School of many "></h1>
        <nav class="">
            <div class="container-fluid">-->

    <!--
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    -->
    </div>
    </nav>
    </div>
</header>
<?php if (isset($_SESSION['message'])): ?>
<div class="alert alert-success" role="alert">
    <?php echo $_SESSION['message'] ?>
    <?php unset($_SESSION['message']) ?>
</div>

<?php endif; ?>