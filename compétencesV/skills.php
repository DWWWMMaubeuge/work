<?php
session_start();
include 'fonctionAffichages.php';
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
        <link rel="stylesheet" href="slide.css">
        <link rel="stylesheet" href="skills.css">
        <title>Document</title>
    </head>
    <body class="bg-dark">
    <div id="tabSkills">Tableau de note</div>
    <div id="letableau"></div>
    <?php
    echo "<div class='container mt-5 border border-primary p-5 rounded background'>";
    echo "<h1 class='text-center text-white'>Bonjour ". $_SESSION['prenom']." ". $_SESSION['nom'];
    echo "</div>";
    echo "<div class='container background mt-5 mb-5 border border-primary p-5 rounded'>";
    echo "<div class='row'>";
    formMat($skills,$array2,0);
    echo "</div>";
    echo "<div class='text-center'><a href='disconnect.php' class='btn btn-primary text-decoration-none' >Deconnexion</a></div>";
    echo "</div>";

    ?>

    <script src = 'sendResult.js'></script>
    <script src = 'AffichageDirect.js'></script>
   </body>
    </html>
