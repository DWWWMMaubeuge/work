<?php
require_once("jpgraph-4.3.4/src/jpgraph.php");
require_once("jpgraph-4.3.4/src/jpgraph_line.php");
include "PHP/idBDD.php";
session_start();
//var_dump(gd_info());
$query=$bdd->prepare("SELECT r.*,m.matiere FROM resultat as r INNER JOIN matieres as m ON r.id_mat=m.id WHERE id_user=:id_user AND id_mat = :id_mat ORDER BY date ");
$idMat=$_GET['idMat'];
$query->bindParam(':id_user',$_SESSION['idUser']);
$query->bindParam(':id_mat',$idMat);
$query->execute();
$notesUser=$query->fetchAll(PDO::FETCH_ASSOC);

$largeur=500;
$hauteur=400;
$graph=new Graph($largeur,$hauteur);
$graph->img->SetImgFormat('png');
$graph->SetScale('intlin');

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);



$graph->title->Set('Evolution '.$notesUser[0]['matiere']);
$graph->yaxis->title->Set('Note');
$graph->title->SetFont( FF_ARIAL , FS_BOLD ,30);
$graph->yaxis->title->SetFont( FF_ARIAL , FS_BOLD ,15);
$graph->xaxis->title->SetFont( FF_ARIAL , FS_BOLD ,15);
$graph->SetBox(false);

$graph->SetMargin(50,50,20,20);
$graph->SetMarginColor('black');

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xaxis->HideLabels();


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
$graph->legend->SetFont(FF_ARIAL,FS_NORMAL,15);
$graph->legend->SetFrameWeight(1);

$graph->Stroke();



?>