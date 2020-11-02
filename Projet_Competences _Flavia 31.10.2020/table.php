<?php

include_once(  "CO_functions.php"  );
echo "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";

session_start();
$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>bonjour $surname_user</h3>\n";



$req = "SELECT * FROM flavia.skills";
$result = executeSQL( $req );

$skills = [];
while( $data = $result->fetch_assoc())
{
    array_push( $skills, [ $data['id'], $data[ 'name']   ] );
}



?>
