<?php
include 'idBDD.php';
try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

$query = $bdd->prepare("INSERT INTO users(name,firstname,email,password) VALUES(:name , :firstname , :email , :password)");

if (isset($_POST["submit"])) {
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd'])) {
        $query->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $query->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $query->bindParam(':password', $_POST['pwd'], PDO::PARAM_STR);
        $query->execute();
        header('Location: index.php');
    } else {
        echo 'Tout les champs doivent être remplis';
    }
}
