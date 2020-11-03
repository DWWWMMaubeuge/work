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
        <title>Document</title>
    </head>
    <style>
        #tabSkills{
            top:0;
            background-color: black;
        }
        #letableau, #tabSkills {
            padding: 5px;
            text-align: center;
            border: solid 1px #c3c3c3;
            position:fixed;
            width:100%;
            color:white;
        }

        #letableau{
            background-color: white;
            padding: 50px;
            display: none;
            top:38px;
        }
    </style>
    <body class="bg-dark">
    <?php
    echo "<div class='container bg-light mt-5 border border-primary p-5 rounded'>";
    echo "<h1 class='text-center'>Bonjour ". $_SESSION['nom']." ". $_SESSION['prenom'];
    echo "</div>";
    echo "<div class='container bg-light mt-5 border border-primary p-5 rounded'>";
    echo "<form method=\"post\">";
    formMat($skills);
    echo "</form>";
    echo "<div class='text-center'><a href='disconnect.php' class='btn btn-primary text-decoration-none' >Deconnexon</a></div>";
    echo "</div>";
    ?>
    <div id="tabSkills">Tableau de note</div>
    <div id="letableau"></div>

    <script src = 'sendResult.js'></script>
    <script src = 'AffichageDirect.js'></script>
   </body>
    </html>
