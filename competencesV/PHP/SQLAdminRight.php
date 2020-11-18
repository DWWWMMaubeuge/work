<?php
include_once 'idBDD.php';

$query=$bdd->prepare("UPDATE users SET adminRight=:admin WHERE id=:id_user");

$query->bindParam(":id_user", $_POST['user']);
$query->bindParam(':admin', $_POST['admin']);
$query->execute();