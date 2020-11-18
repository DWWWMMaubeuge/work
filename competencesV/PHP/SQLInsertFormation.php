<?php
include_once 'idBDD.php';

$query=$bdd->prepare("INSERT INTO formation(name) VALUES(:name)");
$query->bindParam(":name", $_POST['form']);
$query->execute();