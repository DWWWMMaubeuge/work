<?php

try 
  {
    $bdd = new PDO("mysql:host=localhost;dbname=utilisateur;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } 
  catch(Exception $e) 
  {
    die("Erreur: " . $e->getMessage());
  }
  function executeSQL( $req )
  {
    GLOBAL $bdd;
    //echo "$req<br>";
    return $bdd->query( $req );
  }
  function convertDate($date) {
    return $timestamp = date('d-m-Y à G:i:s', strtotime($date));
}