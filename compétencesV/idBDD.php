<?php
$host = 'localhost';
$dbname='evaluations';
$user='root';
$pass='';

try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
