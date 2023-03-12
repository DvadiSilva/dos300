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
<?php
    if(!isset($_SESSION["user"])){
        echo '
            <ul class="navbar-nav align-items-center d-flex justify-content-between w-100">
                <li class="nav-item">
                    <a class="nav-link p-0" href="/">
                        <img src="/images/random/300_logo_clean.png" alt="home" class="home-logo">
                    </a>
                </li>
                <form class="d-flex align-items-center w-50" role="search">
                    <input class="form-control" type="search" placeholder="O que estás à procura?" aria-label="Search">
                    <a href="/search" class="btn my-button border border-dark" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                </form>

                <div class="d-flex justify-content-around align-items-center">
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="/login" role="button">
                            <img class="" src="/images/random/login-icon.png">
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="/products" role="button">
                            <img class="" src="/images/random/product-icon.png">
                            Produtos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="/services" role="button">
                            <img class="" src="/images/random/services-icon.png">
                            Serviços
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="/sales" role="button">
                            <img class="" src="/images/random/product-promo-icon.png">
                            Promoções
                        </a>
                    </li>
                </div>
            </ul>
        ';
    }
    else{
        echo '
            <ul class="navbar-nav align-items-center d-flex justify-content-between w-100">
                <li class="nav-item">
                    <a class="nav-link p-0" href="/">
                        <img src="/images/random/300_logo_clean.png" alt="home" class="home-logo">
                    </a>
                </li>
                <form class="d-flex align-items-center w-50" role="search">
                    <input class="form-control" type="search" placeholder="O que estás à procura?" aria-label="Search">
                    <a href="/search" class="btn my-button border border-dark" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </a>
                </form>

                <div class="d-flex justify-content-around align-items-center">
                    <li class="nav-item dropdown dropend">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="w-75 home-profile border border-dark" src="/images/random/defaultUserPic.png">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark ">
                            <li>
                                <a class="dropdown-item" href="/profile">Perfil</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="/products" role="button">
                            <img class="" src="/images/random/product-icon.png">
                            Produtos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="/services" role="button">
                            <img class="" src="/images/random/services-icon.png">
                            Serviços
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="/sales" role="button">
                            <img class="" src="/images/random/product-promo-icon.png">
                            Promoções
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="/cart" role="button">
                            <img class="" src="/images/random/cart-icon.png">
                        </a>
                    </li>
                </div>
            </ul>
        ';
    }
?>
        </nav>
            <main class="py-4 container">