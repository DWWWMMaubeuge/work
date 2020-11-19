<?php


include_once(  "Serveur.php"  );




if ( isset($_SESSION[ 'ID_user' ])  )
{
	$ID_user = $_SESSION[ 'ID_user' ];
	$name_user = $_SESSION[ 'name' ];
	$surname_user = $_SESSION[ 'surname' ];
}

if( $_GET['idUser'] != "" && $_GET['idSkill'] != "" && $_GET['valSkill'] != "" )
{
    $ID_user        = $_GET['idUser'];
    $idSkill       = $_GET['idSkill'];
    $valSkill       = $_GET['valSkill'];
  
    $req = "INSERT INTO DWWM_Maubeuge.results ( id_user, id_skill, result ) VALUES ( ".$ID_user.", ".$idSkill.", ".$valSkill." );";
    $result = executeSQL( $req );
}

?>
