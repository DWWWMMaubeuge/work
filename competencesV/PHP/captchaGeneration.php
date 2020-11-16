<?php
require_once "../jpgraph-4.3.4/src/jpgraph_antispam.php";
session_start();
$spam = new AntiSpam();

$chars = $spam->Rand(5);

$_SESSION['captcha']=$chars;

//var_dump($_SESSION['captcha']);
if( $spam->Stroke() === false ) {
    die('Illegal or no data to plot');
}
?>