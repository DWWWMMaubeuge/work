<?php
include 'idBDD.php';

$query1 = $bdd->prepare("INSERT INTO users(name,firstname,email,password) VALUES(:name , :firstname , :email , :password)");
$query2 = $bdd->prepare("SELECT count(*) AS nb FROM users WHERE email=:email");

if (isset($_POST["submit"])) {
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd']))
        {
            $query2->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $query2->execute();
            $array = $query2->fetch(PDO::FETCH_ASSOC);
            if ($array['nb'] == 0) {
                $query1->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
                $query1->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
                $query1->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
                $query1->bindParam(':password', $_POST['pwd'], PDO::PARAM_STR);
                $query1->execute();
                header('Location: connnexion.php');
            } else {
                echo "cet utilisateur existe déja";
            }
        }
        else
            {
            echo 'Tout les champs doivent être remplis';
        }
}