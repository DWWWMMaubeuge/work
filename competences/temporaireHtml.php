<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/30abe9456d.js" crossorigin="anonymous"></script>
    <title>Accueil02</title>
</head>
<body>
<!-- <div class="sucess">

<div class="btn">
<span class="noselect">< Evaluation </span>
</div>
<p><C'est votre tableau de bord. </p> -->



<a href="logout.php"><h4><i class="fas fa-sign-out-alt"></i></h4></a>


<?php
require_once "parametres.php";
include_once "CO_global_functions.php";

session_start();

if (!isset($_SESSION["surname"])) {
    header("Location: Login.php");
    exit();
}
/* function setWidgetValuex( $skill  )
{
$widget = "<div ><p>".$skill[1]."</p><input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\"></div>\n";
return $widget;
} */

function setWidgetValue2($skill)
{

    $widget = "<div class =\"styled\"  >\n";
    $widget .= "<p>" . $skill[1] . "</p><select id= \"lol\" name=\"valSkill\" onchange=\"MAJ_Value( " . $skill[0] . ", this.value )\">\n";
    $widget .= "<option value= id='lool'></option>\n";
    for ($a = 1; $a < 11; $a++) {
        $widget .= "<option value=\"$a\">$a</option>\n";
    }

    $widget .= "</select><br>\n";
    $widget .= "</div>\n";

    return $widget;
}