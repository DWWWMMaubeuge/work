<?php
include 'idBDD.php';
session_start();

$query3 = $bdd->prepare("UPDATE users SET firstname=:firstname WHERE id=:id_user");
$query3->bindParam(':id_user', $_SESSION['idUser']);

if (isset($_POST['newFirstName']) && !empty($_POST['newFirstName'])) {
    $firstname = htmlspecialchars($_POST['newFirstName']);
    $query3->bindParam(':firstname', $firstname);
    $query3->execute();
    //$errors = 3;
    //header("Location:../index1.php?errors=$errors");
}
