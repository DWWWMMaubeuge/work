<?php

include 'idBDD.php';
session_start();

$query3 = $bdd->prepare("UPDATE users SET name=:name WHERE id=:id_user");
$query3->bindParam(':id_user', $_SESSION['idUser']);

if (isset($_POST['newName']) && !empty($_POST['newName'])) {
    $name = htmlspecialchars($_POST['newName']);
    $query3->bindParam(':name', $name);
    $query3->execute();
    //$errors = 2;
    //header("Location:../index1.php?errors=$errors");
}
