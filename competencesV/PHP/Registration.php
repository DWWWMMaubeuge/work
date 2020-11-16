<?php
include 'idBDD.php';

$query1 = $bdd->prepare("INSERT INTO users(name,firstname,email,password,id_Form) VALUES(:name , :firstname , :email , :password , :id_Form)");
$query2 = $bdd->prepare("SELECT count(*) AS nb FROM users WHERE email=:email");
$query3 = $bdd->prepare("SELECT id FROM users WHERE email=:email");
$query4 = $bdd->prepare("INSERT INTO resultat(id_user,eval,id_mat,id_form) VALUES(:id_user,0,:id_mat,:id_form)");
$query5 = $bdd->prepare("SELECT * FROM matieres WHERE id_form=:id_form");
//var_dump($nbMat);
if (isset($_POST["submitIns"])) {
    if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['firstname']) && !empty($_POST['firstname']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pwd1']) && !empty($_POST['pwd1']) && isset($_POST['pwd2']) && !empty($_POST['pwd2']) && isset($_POST['formation']) && !empty($_POST['formation']))
    {
        if ($_POST['pwd1'] == $_POST['pwd2'])
        {

            $query2->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $query2->execute();
            $array = $query2->fetch(PDO::FETCH_ASSOC);

            if ($array['nb'] == 0) {
                $name = htmlspecialchars($_POST['name']);
                $firstname = htmlspecialchars($_POST['firstname']);
                $email = htmlspecialchars($_POST['email']);
                $pwd1 = hash('sha256', $_POST['pwd1']);
                $formation=htmlspecialchars($_POST['formation']);
                $query1->bindParam(':name', $name, PDO::PARAM_STR);
                $query1->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $query1->bindParam(':email', $email, PDO::PARAM_STR);
                $query1->bindParam(':password', $pwd1, PDO::PARAM_STR);
                $query1->bindParam(':id_Form', $formation, PDO::PARAM_STR);
                $query1->execute();
                $query3->bindParam(':email', $email);
                $query3->execute();
                $array2 = $query3->fetch(PDO::FETCH_ASSOC);
                $query5->bindParam(':id_form',$_POST['formation']);
                $query5->execute();
                $Mat=$query5->fetchAll(PDO::FETCH_ASSOC);
                foreach ($Mat as $array3) {
                    $query4->bindParam(':id_user', $array2['id']);
                    $query4->bindParam(':id_mat', $array3['id']);
                    $query4->bindParam(':id_form',$formation);
                    $query4->execute();
                }
                $errors=3;
                header('Location: index1.php?errors='.$errors);
            }
            else{
                $errors=4;
                header('Location: index1.php?errors='.$errors);
            }
        }
        else{
            $errors=5;
            header('Location: index1.php?errors='.$errors);
        }
    }
    else{
        $errors=6;
        header('Location: index1.php?errors='.$errors);
    }
}