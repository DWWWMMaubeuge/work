<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

// maj_value.php?idUser=4&idSkill=4&valSkill=5

if( $_GET['idUser'] != "" && $_GET['idSkill'] != "" && $_GET['valSkill'] != "" ) 
{
    $ID_user        = $_GET['idUser'];
    $ID_skill        = $_GET['idSkill'];
    $valSkill       = $_GET['valSkill'];
  
    $req = "INSERT INTO $DB_dbname.results ( id_user, id_skill, result ) VALUES ( ".$ID_user.", ".$ID_skill.", ".$valSkill." );";
    $result = executeSQL( $req );
}
?>
