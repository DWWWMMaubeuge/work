<?php
include 'idBDD.php';

$query1 = $bdd->prepare("INSERT INTO users(name,firstname,email,password) VALUES(:name , :firstname , :email , :password)");
$query2 = $bdd->prepare("SELECT count(*) AS nb FROM users WHERE email=:email");
$query3 = $bdd->prepare( "SELECT id FROM users WHERE email=:email");
$query4 = $bdd->prepare("INSERT INTO resultat(id_user,eval,id_mat) VALUES(:id_user,0,:id_mat)");
$query5 = $bdd->prepare("SELECT count(*) as nb2 FROM matieres");
$query5->execute();
$nbMat=$query5->fetch(PDO::FETCH_ASSOC);
//var_dump($nbMat);
if (isset($_POST["submit"])) {
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd']) && !empty($_POST['pwd']))
        {
            $query2->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $query2->execute();
            $array = $query2->fetch(PDO::FETCH_ASSOC);
            if ($array['nb'] == 0) {
                $name = htmlspecialchars($_POST['name']);
                $firstname = htmlspecialchars($_POST['firstname']);
                $email = htmlspecialchars($_POST['email']);
                $pwd = hash('sha256',$_POST['pwd']);
                $query1->bindParam(':name', $name, PDO::PARAM_STR);
                $query1->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $query1->bindParam(':email', $email, PDO::PARAM_STR);
                $query1->bindParam(':password', $pwd, PDO::PARAM_STR);
                $query1->execute();
                $query3->bindParam(':email',$email);
                $query3->execute();
                $array2=$query3->fetch(PDO::FETCH_ASSOC);
                for ($i=1;$i<=intval($nbMat['nb2']);$i++){
                    $query4->bindParam(':id_user',$array2['id']);
                    $query4->bindParam(':id_mat',$i);
                    $query4->execute();
                }
                header('Location: connnexion.php?success=true');
            } else {
                echo "<div class='alert alert-danger'>cet utilisateur existe déja</div>";
            }
        }
        else
            {
            echo "<div class='alert alert-danger'>Tout les champs doivent être remplis</div>";
        }
}