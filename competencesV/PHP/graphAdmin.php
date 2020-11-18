<?php
require_once("jpgraph-4.3.4/src/jpgraph.php");
require_once("jpgraph-4.3.4/src/jpgraph_line.php");
include "PHP/idBDD.php";
session_start();

$query=$bdd->prepare("SELECT r.*,m.matiere FROM resultat as r INNER JOIN matieres as m ON r.id_mat=m.id WHERE id_user=:id_user AND id_mat = :id_mat ORDER BY date ");
$query2=$bdd->prepare("SELECT ");
