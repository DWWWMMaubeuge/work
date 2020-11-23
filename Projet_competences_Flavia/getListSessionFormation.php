<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

$str = "";
                                    
if( $_GET['idFormation'] != "" ) 
{
    $ID_formation    	= $_GET['idFormation'];



	$req = "select * from $DB_dbname.sessions where id_formation=$ID_formation;";
	$result = executeSQL( $req );

	$str = "<table>\n"; 
	while(  ($ligne = $result->fetch_assoc()) )  
	{
		$str .= "<tr>\n";
		$str .= "<td>".$ligne[ 'name' ]."</td>\n";
		$str .= "<td>".$ligne[ 'datex' ]."</td>\n";
		$str .= "<td>".$ligne[ 'date_begin' ]."</td>\n";
		$str .= "<td>".$ligne[ 'date_end' ]."</td>\n";
		$str .= "</tr>\n";
	}
	$str .= "</table>\n"; 
}
echo $str;
?>