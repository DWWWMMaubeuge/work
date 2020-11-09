<?php


include_once(  "Serveur.php"  );




if( $_GET['idSkill'] != "" && $_GET['valSkill'] != "" ) 
{
    $idSkill       = $_GET['idSkill'];
    $valSkill       = $_GET['valSkill'];
  
    $req = "INSERT INTO $DB_dbname.results ( id_user, id_skill, result ) VALUES ( ".$ID_user.", ".$idSkill.", ".$valSkill." );";
    $result = executeSQL( $req );
}

?>
