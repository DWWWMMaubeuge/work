<?php
include "idBDD.php";
$query=$bdd->prepare("INSERT INTO matieres(matiere,id_form,active) VALUES(:matiere,:id_form,1)");
$query2=$bdd->prepare("SELECT * FROM users WHERE id_form=:id_form");
$query3=$bdd->prepare("INSERT INTO resultat(id_mat,id_user,eval,id_form) VALUES(:id_mat,:id_user,0,:id_form)");
$query4=$bdd->prepare("SELECT * FROM matieres WHERE matiere=:matiere");
$idForm=$_SESSION['formation'];
$query2->bindParam(':id_form',$idForm);
$query2->execute();
$users=$query2->fetchAll(PDO::FETCH_ASSOC);

if( isset($_POST['mat3'])){
    $mat=htmlspecialchars($_POST['mat3']);
    $query->bindParam(':matiere',$mat);
    $query->bindParam(':id_form',$idForm);
    $query->execute();
    $query4->bindParam(':matiere',$mat);
    $query4->execute();
    $matiere=$query4->fetch(PDO::FETCH_ASSOC);
    $query3->bindParam(':id_mat',$matiere['id']);
    $query3->bindParam(':id_form',$idForm);
    foreach ($users as $user){
        $query3->bindParam(':id_user',$user['id']);
        $query3->execute();
    }

}

?>