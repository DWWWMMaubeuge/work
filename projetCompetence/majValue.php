<?php

include_once(  "functionConnect.php"  );

session_start();
$ID_user=0;
$name_user="";
$surname_user="";

if ( isset($_SESSION[ 'ID_user' ])  )
{
	$ID_user = $_SESSION[ 'ID_user' ];
	$name_user = $_SESSION[ 'name' ];
	$surname_user = $_SESSION[ 'surname' ];
}

if( $_GET['idSkill'] != "" && $_GET['valSkill'] != "" ) 
{
    $idSkill       = $_GET['idSkill'];
    $valSkill       = $_GET['valSkill'];
  
    $req = "INSERT INTO $DB_dbname.results ( id_user, id_skill, result ) VALUES ( ".$ID_user.", ".$idSkill.", ".$valSkill." );";
    $result = executeSQL( $req );
}

?>