<?php
include "Entete.php";
HEAD("Logout");

session_start();
unset($_SESSION[ 'surname' ]);
header("location:Acceuil.php");

?>