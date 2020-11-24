<?php

session_start();
// Vidage du tableau de la super globale $_SESSION
$_SESSION = array();
// Destruction de la session de l'utilisateur
session_destroy();
// Redirection de l'utilisateur vers l'accueil
header('Location: index.php');
exit();

?>