<?php
include "idBDD.php";

$query=$bdd->prepare("UPDATE matieres SET active=1 WHERE id=:id_mat");

if( isset($_POST['mat2'])){
    $idMat=$_POST['mat2'];
    $query->bindParam(':id_mat',$idMat);
    $query->execute();
}