<?php
include 'Login.php'
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/main.css">-->
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
    <?php
        if(isset($_GET['success']) && $_GET['success']){
            echo "<div class=\"alert alert-success\">Compte créé avec succés</div>";
        }
    ?>
    <!--<div class="container background border border-primary p-5 rounded" style="margin:200px auto auto auto;">-->
        <h1>Connectez-vous <!--<span class="h6">Pas encore inscrit?<a href="inscription.php"> Inscrivez-vous</a></span>--></h1>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail3">adresse Email</label>
                <input type="email" class="form-control" id="exampleInputEmail3" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword3">mot de passe</label>
                <input type="password" class="form-control" name="pwd" id="exampleInputPassword1=2">
            </div>
            <div class="form-inline ">
                <input type="text" name="captcha" id="captcha" class="form-control mr-1 "><img src="PHP/captchaGeneration.php" alt="">
            </div>
            <input type="submit" class="btn btn-primary" name="submitCon" value="Connectez-vous">
        </form>
    <!--</div>-->
</body>
</html>
