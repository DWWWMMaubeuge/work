<?php
require_once("jpgraph-4.3.4/src/jpgraph.php");
require_once("jpgraph-4.3.4/src/jpgraph_line.php");
include "PHP/idBDD.php";
session_start();
//var_dump(gd_info());
$query=$bdd->prepare("SELECT r.*,m.matiere FROM resultat as r INNER JOIN matieres as m ON r.id_mat=m.id WHERE id_user=:id_user AND id_mat = 1 ORDER BY date ");
$query->bindParam(':id_user',$_SESSION['idUser']);
$query->execute();
$notesUser=$query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($notesUser);
$largeur=1000;
$hauteur=800;
$graph=new Graph($largeur,$hauteur);
$graph->img->SetImgFormat('png');
$graph->SetScale('textlin');

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Evolution '.$notesUser[0]['matiere']);
$graph->SetBox(false);

$graph->SetMargin(40,20,36,63);
$graph->SetMarginColor('black');

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);



$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");

$ydata= array();

foreach($notesUser as $note){
    array_push($ydata,intval($note['eval']));
}
//var_dump($ydata);


$lineplot= new LinePlot($ydata);
$graph->Add($lineplot);
$lineplot->SetColor('red');
$lineplot->SetLegend($notesUser[0]['matiere']);
$graph->legend->SetFrameWeight(1);

$graph->Stroke();
?>