<?php
include "idBDD.php";


$query=$bdd->prepare("UPDATE matieres SET active=0 WHERE id=:id_mat");

if( isset($_POST['mat1'])){
    $idMat=$_POST['mat1'];
    $query->bindParam(':id_mat',$idMat);
    $query->execute();
}
?>