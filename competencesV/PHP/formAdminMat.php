<?php
session_start();
include 'fonctionAffichages.php';
include 'DesactivationMat.php';
include 'ActivationMat.php';
include 'InsertionMat.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p class="h1">Vous pouvez ici gerer et visualiser votre formation</p>
    <form method="post" class="form-group">
        <?php
        deactivateMat($skills);
        ?>
        <input class="btn btn-primary mt-2" type="submit" name="deactivate" ic="deactivate" value="Desactiver" >
    </form>
    <form method="post" class="form-group">
        <?php
        activateMat($skills2);
        ?>
        <input class="btn btn-primary mt-2" type="submit" name="activate" value="Activer" >
    </form>
    <form method="post" class="form-group">
        <?php
        insertMat();
        ?>
        <input class="btn btn-primary mt-2" type="submit" name="insert" value="Inserer" >
    </form>
</body>
</html>