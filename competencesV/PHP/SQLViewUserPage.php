<?php
include "idBDD.php";

$query=$bdd->prepare("SELECT r.id_mat,r.eval,r.date,r.id_form,M.matiere,r.id
                                FROM resultat AS r
                                    INNER JOIN matieres AS M ON r.id_mat=M.id
                                    INNER JOIN ( 
                                        SELECT id_user AS idUser , id_mat AS idMat , MAX(date) AS evalDate
                                            FROM resultat as r2
                                                INNER JOIN (SELECT id_user AS idUser FROM resultat WHERE id_user=:id_user GROUP BY id_user) a
                                                ON r2.id_user = a.idUser
                                                GROUP BY idMat ) m
                                                    on r.id_mat=m.idMat 
                                                    AND r.date=m.evalDate
                                                    AND r.id_form=M.id_form
                                                    AND M.active=1"
);

$query->bindParam(':id_user', $_GET['idUser']);
$query->execute();
$array=$query->fetchAll(PDO::FETCH_ASSOC);
sort($array);
//var_dump($array);
$query2=$bdd->prepare("SELECT * FROM formation WHERE id=:id_form ");
$query2->bindParam(':id_form',$_SESSION['formation']);
$query2->execute();
$formation=$query2->fetch(PDO::FETCH_ASSOC);

$query3=$bdd->prepare("SELECT * FROM users WHERE id=:id_user");
$query3->bindParam(":id_user",$_GET['idUser']);
$query3->execute();
$user=$query3->fetch(PDO::FETCH_ASSOC);
//var_dump($user);



function compProfil2($skills){
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