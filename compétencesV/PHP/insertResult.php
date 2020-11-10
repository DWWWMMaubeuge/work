<?php
include 'idBDD.php';
session_start();

$query=$bdd->prepare("INSERT INTO resultat(id_mat,id_user,eval,id_form) VALUES (:id_mat,:id_user,:eval,:id_form)");
$query->bindParam(':id_mat' , $_POST['id_mat'] );
$query->bindParam(':id_user',$_SESSION['idUser'] );
$query->bindParam(':eval' , $_POST['eval'] );
$query->bindParam(':id_form' , $_SESSION['formation'] );
$query->execute();

var_dump($_POST['eval']);
?>

