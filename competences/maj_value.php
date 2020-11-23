<?php

require_once("parametres.php");
include_once("CO_global_functions.php");

session_start();
    $ID_user      = $_SESSION[ 'ID_user' ];
    $name_user    = $_SESSION[ 'name' ];
    $surname_user = $_SESSION[ 'surname' ];
    $id_formation = $_SESSION['id_formation'];


if( $_GET['idSkill'] != "" && $_GET['valSkill'] != "" ) 
{
    $idSkill      = $_GET['idSkill'];
    $valSkill     = $_GET['valSkill'];
    $ID_user      = $_GET['idUser'];

    $req = "INSERT INTO $DB_dbname.results ( id_user, id_skill, result, id_session ) VALUES ( ".$ID_user.", ".$idSkill.", ".$valSkill.", ".$id_formation." );";
    $result = executeSQL( $req );
}

?>
