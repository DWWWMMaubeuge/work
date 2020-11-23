<?php
include 'idBDD.php';
//session_start();
$query=$bdd->prepare("SELECT * FROM matieres WHERE id_form=:id_form");
$query->bindParam(':id_form', $_SESSION['formation']);
$query->execute();
$matieres=$query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($matieres);

function tabGraph($matieres){
    echo "<nav>";
    echo "<div class=\"nav\" id=\"nav-tab\" role=\"tablist\">";
    foreach($matieres as $matiere){
        echo "<a class=\"nav-item nav-link background2 text-white border border-dark\" id=nav-".$matiere['matiere']."-tab data-toggle=\"tab\" href=\"#nav-".$matiere['matiere']."\" role=\"tab\" aria-controls=\"nav-".$matiere['matiere']."\" aria-selected=\"true\">".$matiere['matiere']."</a>";
    }
    echo "</div>";
    echo "</nav>";
    echo "<div class=\"tab-content\" id=\"nav-tabContent\">";
    foreach ($matieres as $matiere){
        echo "<div class=\"tab-pane fade\" id=\"nav-".$matiere['matiere']."\" role=\"tabpanel\" aria-labelledby=\"nav-".$matiere['matiere']."-tab\"><img src='../graph.php?idMat=".$matiere['id']."' alt=''></div>";
    }
    echo "</div>";

}


?>