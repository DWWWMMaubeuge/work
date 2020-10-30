<?php require_once('pdo-connect.php'); ?>
<?php require_once('verifications.php'); ?>
<?php userIsLogged(); ?>
<?php $users = $bdd->query('SELECT * FROM Membres ORDER BY ID'); ?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <title>Formation DWM / Inscription </title>
</head>
<body class="bg-secondary text-white">
    <?php require_once('navbar.php'); ?>
    <div class="container my-5">
        <h1 class>Liste des utilisateurs</h1>

        <table class="table table-hover table-dark mx-auto">
            <thead>
                <tr>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
            <?php while($user = $users->fetch()) { ?>
                <tr>
                <td scope="row"><?= $user['Prenom']; ?></td>
                <td scope="row"><?= $user['Nom']; ?></td>
                <td scope="row"><?= $user['Email']; ?></td>
                </tr>
            <?php } ?>

    </div>
    <?php require_once('footer.php'); ?>