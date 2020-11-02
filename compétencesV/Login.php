<?php
include 'idBDD.php';

session_start();

try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}
$query1=$bdd->prepare("SELECT count(*) AS nb FROM users WHERE email=:email AND password=:mdp");
$query2=$bdd->prepare("SELECT * FROM users WHERE email=:email AND password=:mdp");


if (isset($_POST['submit'])){
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd'])){
        $nom=$_POST['name'];
        $prenom=$_POST['firstname'];
        $email=$_POST['email'];
        $mdp=$_POST['pwd'];
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
            echo "cet utilisateurs n'existe pas";
        }

    }
}
?>