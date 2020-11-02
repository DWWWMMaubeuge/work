<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=utilisateur;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die("Erreur: " . $e->getMessage());
  }

  $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
 
     
    if(isset($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['city'],$_POST['email'],$_POST['tel1'],$_POST['tel2'],$_POST['password'],$_POST['repassword'],$_POST['child'],$_POST['age'],$_POST['info']))
    {
     
    if($nom&&$prenom&&$adresse&&$city&&$email&&$tel1&&$password&&$repassword&&$child&&$age){
         
         
        if($password==$repassword){
             
          
            $query = $db->prepare( 'INSERT INTO users ( id,nom,prenom,adresse,ville,email,telephone1,telephone2,password,child,age,info ) VALUES (NULL, :nom, :prenom, :adresse, :city, :email, :tel1, :tel2, :password, :child, :info   ' );
        $query->bindValue('nom', $_POST['nom'], PDO::PARAM_STR);
        $query->bindValue('prenom', $_POST['prenom'], PDO::PARAM_STR);
        $query->bindValue('adresse', $_POST['adresse'], PDO::PARAM_STR);
        $query->bindValue('city', $_POST['city'], PDO::PARAM_STR);
        $query->bindValue('email', $_POST['email'], PDO::PARAM_STR);
        $query->bindValue('tel1', $_POST['tel1'], PDO::PARAM_STR);
        $query->bindValue('tel2', $_POST['tel2'], PDO::PARAM_STR);
        $query->bindValue('password', $_POST['password'], PDO::PARAM_STR);
        $query->bindValue('child', $_POST['child'], PDO::PARAM_STR);
        $query->bindValue('info', $_POST['info'], PDO::PARAM_STR);
        $query->execute();
         
        }else echo"les 2 password doivent etre identique";
         
         
         
    } else echo"Veuillez saisir tous les champs";
     
    }
?>
  ?>