<?php
session_start();
include 'fonctionAffichages.php';
?>
<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/main.css">
    <title>Admin</title>
</head>
<body>
<nav class="navbar navbar-light bg-light shadow">
    <a class="navbar-brand h1" href="../index1.php"><i class="fas fa-laptop-house"></i>  Compétences</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index1.php"><i class="fas fa-concierge-bell"></i>  Acceuil</a>
            </li>
        </ul>
        <?php if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) : ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="PHP/skills"><i class="far fa-clipboard"></i>  Auto-Evaluation</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="disconnect.php"><i class="fas fa-sign-out-alt"></i>  Deconnexion</a>
                </li>
            </ul>
        <?php else : ?>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" id="connect" ><i class="fas fa-sign-in-alt"></i>  Connexion</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" id="disconnect"><i class="fas fa-file-signature"></i>  Inscription</a>
                </li>
            </ul>
        <?php endif ; ?>
</nav>
<div class="container my-5 border border-primary p-5 background text-center text-white">
    <?php
    formationChoice();
    supMatSelect($skills);
    addMatSelect();
    ?>
</div>
</body>
</html>