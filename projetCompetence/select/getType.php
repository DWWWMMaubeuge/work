<?php
include_once("../functionConnect.php");

$type = $_GET[ 'type' ];
$req = "SELECT type ,training FROM $DB_dbname.users, $DB_dbname.training WHERE type=training and users.type='$type';";

//$req = "SELECT * FROM xavier.race_animale;"; 	
$result = executeSQL( $req );
$str ="";

while ( $row = $result->fetch_assoc() )
	$str .= "<option value=\"".$row[ 'type' ]."\">".$row[ 'training' ]."</option>\n";
	echo $str;
?>


