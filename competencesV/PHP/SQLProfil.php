<?php
include 'idBDD.php';
$query=$bdd->prepare("SELECT * FROM formation WHERE id=:id_form ");
$query->bindParam(':id_form',$_SESSION['formation']);
$query->execute();
$formation=$query->fetch(PDO::FETCH_ASSOC);

$query2=$bdd->prepare("SELECT * FROM users WHERE id=:id_user");
$query2->bindParam(":id_user",$_SESSION['idUser']);
$query2->execute();
$user=$query2->fetch(PDO::FETCH_ASSOC);
//var_dump($user);



function compProfil($skills){
    foreach ($skills as $array){
        echo "<div class=\"progress-text\">";
        echo "<div class=\"row\">";
        echo "<div class='col-7'>".$array['matiere']."  <a class='graph' id=".$array['id_mat']."><i class=\"fas fa-chart-line\"></i></a></div>";
        echo "<div class='col-5 text-right'>".$array['eval']."/10</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='custom-progress progress'>";
        echo "<div role='progressbar' aria-valuenow='70' aria-valuemin='0' aria-valuemax='100' style='width:".(intval($array['eval'])*10)."%' class='animated custom-bar progress-bar slideInLeft'></div>";
        echo "</div>";
    }
}