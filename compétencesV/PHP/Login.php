<?php
include 'idBDD.php';
session_start();

$query1=$bdd->prepare("SELECT count(*) AS nb FROM users WHERE email=:email AND password=:mdp");
$query2=$bdd->prepare("SELECT * FROM users WHERE email=:email AND password=:mdp");


if (isset($_POST['submit'])){
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd'])){
        $email=htmlspecialchars($_POST['email']);
        $mdp=hash('sha256',$_POST['pwd']);
        $query1->bindParam(':mdp',$mdp,PDO::PARAM_STR);
        $query1->bindParam(':email',$email,PDO::PARAM_STR);
        $query2->bindParam(':mdp',$mdp,PDO::PARAM_STR);
        $query2->bindParam(':email',$email,PDO::PARAM_STR);
        $query1->execute();
        $query2->execute();
        $array1=$query1->fetch(PDO::FETCH_ASSOC);
        //var_dump($array1);
        if ($array1['nb'] != 0){
            $array=$query2->fetch(PDO::FETCH_ASSOC);
            $_SESSION['nom']=$array['name'];
            $_SESSION['prenom']=$array['firstname'];
            $_SESSION['idUser']=$array['id'];
            header("Location:skills.php");
        }
        else{
            echo "<div class=\"alert alert-danger\">Cet utilisateur n'existe pas</div>";
        }

    }
    else{
        echo "<div class=\"alert alert-danger\">Veuillez remplir tout les champs</div>";
    }
}
?>
