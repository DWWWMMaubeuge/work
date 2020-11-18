<?php
include_once 'idBDD.php';
session_start();
$query=$bdd->prepare("SELECT id,name,firstname FROM users WHERE id_form=:id_form");
$id_form=$_SESSION['formation'];
$query->bindParam(':id_form', $id_form );
$query->execute();

$users=$query->fetchAll(PDO::FETCH_ASSOC);

//var_dump($users);

function studentList($users){
   echo "<table class='table table-dark'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th scope='col'>Id</th>";
    echo "<th scope='col'>Prenom</th>";
    echo "<th scope='col'>Nom</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($users as $user){
        echo "<tr>";
        echo "<th scope='row'>".$user['id']."</th>";
        echo "<td>".$user['firstname']."</td>";
        echo "<td>".$user['name']."<a href='ViewUserPage.php?id_user=".$user['id']."'></a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

?>
