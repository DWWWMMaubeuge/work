<?php
include "idBDD.php";

try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}



$query = $bdd->prepare('SELECT * from matieres');
$query->execute();
$skills=[];
while ($array = $query->fetch(PDO::FETCH_ASSOC)) {
    array_push($skills, $array);
}

function formMat($skills){
    foreach( $skills as $array){
        //var_dump($array);
        echo "<div class='form-group'>";
        echo "<label for=$array[id]>$array[matiere]</label>";
        echo "<input  class='form-control' type=\"number\" step=\"1\" id=$array[id] name=$array[matiere] min='0' max='10'>";
        echo "</div>";
    }
}
?>