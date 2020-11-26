<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

                                            
if( isset($_GET['idFormation']) && $_GET['idFormation'] != "" ) 
{
    $ID_formation    	= $_GET['idFormation'];

	$req = "select u.surname as s, u.name as n, u.mail as m, u.datex as i from $DB_dbname.users as u where u.id_formation=$ID_formation;";
    $result = executeSQL( $req );

	$str = "<table>\n"; 
	while(  ($ligne = $result->fetch_assoc()) )  
	{
		$str .= "<tr>\n";
		$str .= "<td>".$ligne[ 's' ]."</td>\n";
		$str .= "<td>".$ligne[ 'n' ]."</td>\n";
		$str .= "<td>".$ligne[ 'm' ]."</td>\n";
		$str .= "<td>".$ligne[ 'i' ]."</td>\n";
		$str .= "</tr>\n";
	}
	$str .= "</table>\n"; 

	echo $str;
}
?>

