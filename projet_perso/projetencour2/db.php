<?php
$bdd = new PDO("mysql:host=localhost;dbname=utilisateur;charset=utf8", "root", "");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
