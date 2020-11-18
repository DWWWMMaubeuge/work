<?php
require '../src/connexion.php';

if(isset($_POST["id_skill"]) ) {
    $id_skill = $_POST["id_skill"];

    $req = $bdd->prepare("UPDATE competences SET active = 0 WHERE id = :id_skill");
    $req->execute(array(
        "id_skill" => $id_skill
    ));

}
?>