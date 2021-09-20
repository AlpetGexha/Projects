<?php

namespace header;

include 'database/config.php';
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/hashtag.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Amsify Plugin -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <title>Blog Post</title>
</head>


<body>

    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">AlpetG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Ballina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addpost.php">Shtopostime</a>
                    </li>
                </ul>
                <form method="GET" action="#" class="d-flex justify-content-end ml-auto">
                    <input class="form-control me-2" id="search" type="search" placeholder="Kërkoni" name="postSerch" required="" oninvalid="this.setCustomValidity('Shruani për të kërkuar');" oninput="this.setCustomValidity('');">
                    <div id="display"></div>
                    <button class="btn btn-outline-success" type="submit" name="submit">Kërko</button>
                </form>
            </div>
        </div>
    </nav>