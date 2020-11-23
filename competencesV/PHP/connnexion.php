<?php
include "Login.php";?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h1>Connectez-vous</h1>
    <form method="post">
        <div class="form-group">
            <label for="email">adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="pwd">mot de passe</label>
            <input type="password" class="form-control" name="pwd" id="pwd">
        </div>
        <div class="form-inline ">
            <input type="text" name="captcha" id="captcha" class="form-control mr-1 "><img src="PHP/captchaGeneration.php" alt="">
        </div>
        <input type="submit" class="btn btn-primary" name="submitCon" id="submitCon" value="Connectez-vous">
    </form>
</body>
</html>
