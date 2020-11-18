<?php
include('./PHP/Login.php');
include('./PHP/Registration.php');
include_once "PHP/affichageSuperPanel.php";
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="JS/ConnectDisconnect.js"></script>
    <script src="JS/profil.js"></script>
    <script src="JS/superPanel.js"></script>
    <link rel="stylesheet" href="CSS/main.css">
    <title>Acceuil</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light shadow">
        <a class="navbar-brand h1" href="./index1.php"><i class="fas fa-laptop-house"></i>  Compétences</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./index1.php"><i class="fas fa-concierge-bell"></i>  Acceuil</a>
                </li>
            </ul>
            <?php if (isset ($_SESSION['admin']) && intval($_SESSION['admin']) == 1) : ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="PHP/adminPage.php"><i class="fas fa-user-cog"></i>  Zone Admin</a>
                    </li>
                </ul>
            <?php endif ; ?>
            <?php if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) : ?>
                <?php if($_SESSION['email'] != 'super@user.fr' AND $_SESSION['admin'] != 1 ) :?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="PHP/skills"><i class="far fa-clipboard"></i>  Auto-Evaluation</a>
                    </li>
                </ul>
                <?php endif ;?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="PHP/disconnect.php"><i class="fas fa-sign-out-alt"></i>  Deconnexion</a>
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
        </div>
    </nav>


    <?php if (isset($_SESSION['prenom']) && isset($_SESSION['nom'])) : ?>
        <?php if ($_SESSION['email']=='super@user.fr'):?>
            <div class="container my-5 border border-primary p-5 background text-center text-white">
                <?php
                formSuperUser($users);
                ?>
            </div>
        <?php else :?>
            <?php if(isset($_GET['errors']) && $_GET['errors']==1):?>
            <div class="alert alert-success">Mot de passe changé avec succés</div>
            <?php endif ;?>
            <div class=" container my-5 border border-primary p-5 background text-center text-white h1">Bienvenue <?= $_SESSION['prenom']." ".$_SESSION['nom'] ?></div>
            <div id="profil" class="mb-2"></div>
        <?php endif ;?>
    <?php else : ?>
        <?php if(isset($_GET['errors']) && $_GET['errors']==1) : ?>
            <div class="alert alert-danger">Mot de passe ou email incorrect, réessayez</div>
        <?php elseif(isset($_GET['errors']) && $_GET['errors']==2 ) : ?>
            <div class="alert alert-danger">Tout les champs doivent être remplis</div>
        <?php elseif(isset($_GET['errors']) && $_GET['errors']==3 ) : ?>
            <div class="alert alert-success">Inscription réussi</div>
        <?php elseif(isset($_GET['errors']) && $_GET['errors']==4 ) : ?>
            <div class="alert alert-danger">Cet utilisateur existe déja</div>
        <?php elseif(isset($_GET['errors']) && $_GET['errors']==5 ) : ?>
            <div class="alert alert-danger">Les mot de passe doivent correspondre</div>
        <?php elseif(isset($_GET['errors']) && $_GET['errors']==6 ) : ?>
            <div class="alert alert-danger">Tout les champs doivent être remplis</div>
        <?php elseif(isset($_GET['errors']) && $_GET['errors']==7 ) : ?>
            <div class="alert alert-danger">Le Captcha est pas bon</div>
        <?php endif ;?>
        <div id="ladiv" class="container my-5 border border-primary p-5 background text-center text-white"></div>
        <div id="ladiv2" class="container my-5 border border-primary p-5 background text-center text-white"></div>
    <?php endif ; ?>



</body>
</html>