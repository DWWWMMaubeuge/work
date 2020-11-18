<?php
include 'idBDD.php';
session_start();

$query1=$bdd->prepare("SELECT count(*) AS nb FROM users WHERE email=:email AND password=:mdp");
$query2=$bdd->prepare("SELECT * FROM users WHERE email=:email AND password=:mdp");


if (isset($_POST['submitCon'])){
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd']) && isset($_POST['captcha']) && !empty($_POST['captcha']) ){
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
            if ($_POST['captcha']==$_SESSION['captcha']) {
                $array = $query2->fetch(PDO::FETCH_ASSOC);
                //var_dump($array);
                $_SESSION['nom'] = $array['name'];
                $_SESSION['prenom'] = $array['firstname'];
                $_SESSION['idUser'] = $array['id'];
                $_SESSION['admin'] = $array['adminRight'];
                $_SESSION['formation'] = $array['id_form'];
                $_SESSION['email']=$array['email'];
                header("Location:./index1.php");
            }
            else{
                $errors=7;
                header("Location:./index1.php?errors=$errors");
            }
        }
        else{
            $errors=1;
            header("Location:./index1.php?errors=$errors");
        }

    }
    else{
        $errors=2;
        header("Location:./index1.php?errors=$errors");
    }
}
?>
