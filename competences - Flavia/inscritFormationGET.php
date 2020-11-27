<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

checkSecurity();


if (
	isset( $_GET['name']				) && 
	( $_GET['name'] != "" 				) 
   ) 
{
    $name        	= $_GET['name'];
  
    $req = "INSERT INTO $DB_dbname.formations ( name ) VALUES ( '".$name."');";
    $result = executeSQL( $req );
}
?>