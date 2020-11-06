<?php
include 'Login.php'
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/main.css">
    <title>Document</title>
</head>

<body class="bg-dark">
    <?php
        if(isset($_GET['success']) && $_GET['success']){
            echo "<div class=\"alert alert-success\">Compte créé avec succés</div>";
        }
    ?>
    <div class="container background border border-primary p-5 rounded" style="margin:200px auto auto auto;">
        <h1>Connectez-vous <span class="h6">Pas encore inscrit?<a href="inscription.php"> Inscrivez-vous</a></span></h1>
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail3">adresse Email</label>
                <input type="email" class="form-control" id="exampleInputEmail3" name="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">mot de passe</label>
                <input type="password" class="form-control" name="pwd" id="exampleInputPassword1">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Connectez-vous">
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>
