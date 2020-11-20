<?php
include_once 'idBDD.php';
include_once 'mailer.php';

$query1 = $bdd->prepare("INSERT INTO users(name,firstname,email,password,id_Form)
                                  VALUES(:name , :firstname , :email , :password , :id_form)");

$query2 = $bdd->prepare("SELECT count(*) AS nb FROM users WHERE email=:email");

$query3 = $bdd->prepare("SELECT id FROM users WHERE email=:email");

$query4 = $bdd->prepare("INSERT INTO resultat(id_user,eval,id_mat,id_form) VALUES(:id_user,0,:id_mat,:id_form)");

$query5 = $bdd->prepare("SELECT * FROM matieres WHERE id_form=:id_form");

$query6= $bdd->prepare("SELECT * FROM formation");
$query6->execute();
$array3=$query6->fetchAll(PDO::FETCH_ASSOC);
//var_dump($array3);


if (isset($_POST['submitBulk'])) {
    if(isset($_POST['bulk']) && isset($_POST['formation'])){
        $str=$_POST['bulk'];
        //var_dump($str);
        $pattern = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i";
        preg_match_all($pattern, $str,$matches);
        foreach ($matches[0] as $email) {
            $query2->bindParam(':email', $email);
            $query2->execute();
            $test = $query2->fetch(PDO::FETCH_ASSOC);
            if ($test['nb'] == 0) {
                $name = 'nom';
                $firstname = 'prenom';
                $nhPwd = rand(1000, 9999);
                mailer($email, $nhPwd);
                $pwd = hash('sha256', $nhPwd);
                $formation = $_POST['formation'];
                $query1->bindParam(':name', $name, PDO::PARAM_STR);
                $query1->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $query1->bindParam(':email', $email, PDO::PARAM_STR);
                $query1->bindParam(':password', $pwd, PDO::PARAM_STR);
                $query1->bindParam(':id_form', $formation, PDO::PARAM_STR);
                $query1->execute();
                $query3->bindParam(':email', $email);
                $query3->execute();
                $array2 = $query3->fetch(PDO::FETCH_ASSOC);
                $query5->bindParam(':id_form', $formation);
                $query5->execute();
                $Mat = $query5->fetchAll(PDO::FETCH_ASSOC);
                foreach ($Mat as $array3) {
                    $query4->bindParam(':id_user', $array2['id']);
                    $query4->bindParam(':id_mat', $array3['id']);
                    $query4->bindParam(':id_form', $formation);
                    $query4->execute();
                }
            }
        }
    }
}
?>