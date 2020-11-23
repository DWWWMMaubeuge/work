<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

                                            
if( $_GET['idSession'] != "" ) 
{
    $ID_session    	= $_GET['idSession'];

	$req = "select u.name as n, u.mail as m, ss.name as s, ss.date_begin as b, us.datex as i from $DB_dbname.user_session as us, $DB_dbname.users as u, $DB_dbname.sessions as ss where u.id=us.id_user and ss.id=us.id_session and us.id_session=$ID_session;";
    $result = executeSQL( $req );

	$str = "<table>\n"; 
	while(  ($ligne = $result->fetch_assoc()) )  
	{
		$str .= "<tr>\n";
		$str .= "<td>".$ligne[ 'n' ]."</td>\n";
		$str .= "<td>".$ligne[ 'm' ]."</td>\n";
		$str .= "<td>".$ligne[ 'b' ]."</td>\n";
		$str .= "<td>".$ligne[ 'i' ]."</td>\n";
		$str .= "</tr>\n";
	}
	$str .= "</table>\n"; 

	echo $str;
}
?>