<?php
include 'Registration.php';
include 'fonctionAffichages.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/main.css">
    <title>Document</title>
</head>
<body>
<!--    <nav class="navbar navbar-light bg-light shadow">
        <a class="navbar-brand h1" href="../index1.php">Compétences</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index1.php">Acceuil</a>
                </li>
            </ul>
    </nav>-->
    <!--<div class="container background border border-primary p-5 rounded" style="margin:100px auto auto auto;">-->
        <h1>Inscrivez-vous<!-- <span class="h6">Déja inscrit? <a href="connnexion.php">Connectez-vous</a></span>--></h1>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputName1">Nom</label>
                <input type="text" class="form-control" id="exampleInputName1" name="name" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputFirstname1">Prenom</label>
                <input type="text" class="form-control" id="exampleInputFirstname1" name="firstname" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmai1">Adresse Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" name="pwd1" id="exampleInputPassword1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">Confirmez mot de passe</label>
                <input type="password" class="form-control" name="pwd2" id="exampleInputPassword2" required>
            </div>
            <div class="form-group">
                <?php SelectForm($array3);?>
            </div>

            <input type="submit" class="btn btn-primary" name="submitIns" value="Valider">
        </form>
    <!--</div>-->
</body>
</html>
