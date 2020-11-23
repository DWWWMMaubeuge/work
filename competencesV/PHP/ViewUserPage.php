<?php
include 'SQLViewUserPage.php';

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="../JS/graphAdmin.js"></script>
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/profil.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UserPage</title>
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
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="PHP/disconnect.php"><i class="fas fa-sign-out-alt"></i>  Deconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container my-5 border border-primary p-5 background text-center text-white">
        <h1>Visionnez le profil de <?php echo $user['name']." ".$user['firstname'] ?></h1>
        <div class="row">
            <div class="col-6">
            <?php compProfil2($array);?>
            </div>
            <div class="col-6">
                <img id='graphAdmin'src="" alt="" style="position:fixed;right:20%;border-radius:20px; ">
            </div>
        </div>
    </div>
<script> var id_user = <?php echo $user['id'] ?></script>
</body>
</html>
