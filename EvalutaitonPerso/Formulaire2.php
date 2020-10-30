<?php
    $serveur = "localhost";
    $dbname = "eval";
    $user = "root";
    $pass = "";
    
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $mail = $_POST["email"];
    $password = $_POST["password"];
    
  
    
    try{
        //On renvoie l'utilisateur vers la page de remerciement
        header("Location:Validation.php");
        //On se connecte à la BDD
        $param = "mysql:host=$serveur;dbname=$dbname";
        echo $param;
        $dbco = new PDO($param,$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //On insère les données reçues
        $sth = $dbco->prepare("
            INSERT INTO form_eval(Nom, Prenom, email, password)
            VALUES(:Nom, :Prenom, :email, :password)");
        $sth->bindParam(':Nom',$nom);
        $sth->bindParam(':Prenom',$prenom);
        $sth->bindParam(':email',$mail);
        $sth->bindParam(':password',$password);
      
      
        $sth->execute();
        
        
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
        print_r($e);
    }
?>

</body>
</html>