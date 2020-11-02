<?php
include 'idBDD.php';
session_start();
try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

$query=$bdd->prepare("INSERT INTO resultat(id_mat,id_user,eval) VALUES (:id_mat,:id_user,:eval)");
$query->bindParam(':id_mat' , $_POST['id_mat'] );
$query->bindParam(':id_user',$_SESSION['idUser'] );
$query->bindParam(':eval' , $_POST['eval'] );
$query->execute();

var_dump($_POST['eval']);
?>

