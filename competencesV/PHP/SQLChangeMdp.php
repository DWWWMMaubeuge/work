<?php
include 'idBDD.php';
session_start();

$query3=$bdd->prepare("UPDATE users SET password=:password WHERE id=:id_user");
$query3->bindParam(':id_user',$_SESSION['idUser']);

if (isset($_POST['newPwd']) && !empty($_POST['newPwd'])) {
    $mdp=hash('sha256',$_POST['newPwd']);
    $query3->bindParam(':password', $mdp);
    $query3->execute();
    //$errors=1;
    //header("Location:../index1.php?errors=$errors");
}
