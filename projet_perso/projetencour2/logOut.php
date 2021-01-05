<?php

/* include_once "header.php";
echo entete(); */
session_start();
$id=0;
if(isset($_SESSION[ 'ID_user' ])){ 
    $id=$_SESSION[ 'ID_user' ];
    unset($_SESSION[ 'ID_user' ]);
    header("location:accueil.php"); 
    exit();
}
/* else{
    header("location:inscription.php");
} */

?>