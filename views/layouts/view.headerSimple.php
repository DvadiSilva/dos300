<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?> - Dos 300!¡</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/css/base.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg home-nav p-0">
            <div class="container p-0">
                <ul class="navbar-nav align-items-center d-flex justify-content-between w-100">
                    <li class="nav-item">
                        <a class="nav-link p-0" href="/">
                            <img src="/images/random/300_logo_clean.png" alt="home" class="home-logo">
                        </a>
                    </li>
<?php
    if($controller==="login"){
        echo '
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-center align-items-center" href="/register" role="button">
                    <img class="" src="/images/random/login-icon.png">
                    Registar
                </a>
            </li>
        ';
    }
    if($controller==="register"){
        echo '
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-center align-items-center" href="/login" role="button">
                    <img class="" src="/images/random/login-icon.png">
                    Login
                </a>
            </li>
        ';
    }
?>
                </ul>
            </div>
        </nav>
            <main class="py-4 container main">
