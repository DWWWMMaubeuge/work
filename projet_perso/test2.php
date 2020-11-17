<?php
 include_once("function_connect.php");

include_once("header.php");
echo entete3("inscription");

$bdd = new PDO("mysql:host=localhost;dbname=utilisateur;charset=utf8", "root", "");

$req2 = $bdd->prepare("SELECT count(*) AS nb FROM users WHERE mail=:mail");


if(isset($_POST['forminscription']))
        {
            if(!empty($_POST['name']) AND !empty($_POST['surname']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['password']) AND !empty($_POST['password2']) &&( $_POST && isset($_POST['name']) && isset($_POST['surname'])  && isset($_POST['mail']) && isset($_POST['mail2'])  && isset($_POST['password']) && isset($_POST['password2'])  ) )
             
            {
              if($_POST['password'] == $_POST['password2'])
              {
                if($_POST['mail'] == $_POST['mail'])
                {
                  $req2->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
                  $req2->execute();
                  $array = $req2->fetch(PDO::FETCH_ASSOC);
                  
                  if($array['nb'] == 0)
                    { 
                      if($_POST['mail'] == $_POST['mail2'])
                        {
                          $name       = $_POST['name'];
                          $surname    = $_POST['surname'];
                          $mail       = $_POST['mail'];
                          $mail2       = $_POST['mail2'];
                          $password   = $_POST['password'];
                          $password2   = $_POST['password2'];
                          $query = $bdd->prepare("INSERT INTO users(name,surname,mail,mail2,password,password2 ) VALUES( :name, :surname, :mail, :mail2, :password, :password )");
                          $query->execute(array(
                          "name"=>$_POST["name"],
                          "surname"=>$_POST["surname"],
                          "mail"=>$_POST["mail"],
                          "mail2"=>$_POST["mail2"],
                          "password"=> ($_POST["password"]),
                          "password2"=> ($_POST["password2"])
                          ));
      
                          $bdd = null;
                          //header( "location:login.php"); 
                          $good ="<h3>Félicitation vous venez de vous inscrire !<a href='login.php'>cliquez ici pour vous connectez !</a></h3>";
                      }
                  
                     else{
                        $erreur3 = "<h3>Vos adresses mails doivent etre identique !</h3>";
                      }
                    }
                      else{
                      $erreur5 = "<h3>Une même adresse mail existe déja !</h3>";
                      }
                    }
                  else{
                    $erreur4 = "<h3>Une même adresse mail existe déja !</h3>";
                     }
                    }
            else{
              $erreur1 = "<h3 class='erreur'>Vos mots de passes doivent être identique !</h3>";
            }
          }
          else{
               $erreur = "<h3>Tous les champs doivent etre complétés !</h3>";
          }
        }
        
        


?>

<body>

    <div class="formulaire container" >
      <FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="">
          <div  class="inscr">
          <h1>Inscription</h1>
            <div class="pad">
                <label class="" for="name">Prénom :</label>
                <INPUT type='text' name='name' placeholder="saisir votre nom ici" id="name">
            </div>
            <div class="pad">
              <label class="" for="surname">Nom :</label>
              <INPUT type='text' name='surname' placeholder=" saisir votre prenom" id="surname">
            </div>
            <div class="pad">
                <label  class="" for="mail">Email :</label>
                <INPUT type='email' name='mail' placeholder="saisir votre mail" id="mail">
            </div>
            <div class="pad">
                <label  class="" for="mail2">Email : </label>
                <INPUT type='email' name='mail2' placeholder="veuillez confirmer votre mail" id="mail2">
            </div>
            <div class="pad">
                <label  class="" for="password">Mot de Passe :</label>
                <INPUT type='password' name='password' placeholder="saisir votre mot de passe" id="password">
            </div>
            <div class="pad">
                <label  class=""  for="password2">confirmation Mot de Passe :</label>
                <INPUT type='password' name='password2' placeholder="veuillez confirmer passe" id="password2">
            </div>
                <div class="enter">
                <INPUT type='submit' name='forminscription' value="Je m'inscris !">
            </div>
            <div class="a">
                <a href="login.php">déja un compte? Connectez-vous ici !</a>
            </div>
            <div class="a">
                  <a href="accueil.php">pas maintenant? retour au menu</a>
            </div>
          
        </div>
      </div>
      </FORM>
    <?php

    if(isset($erreur3))
    {
        echo $erreur3;
    }
    if(isset($erreur4))
    {
        echo $erreur4;
    }
    if(isset($erreur5))
    {
        echo $erreur5;
    }
    if(isset($erreur))
    {
        echo $erreur;
    }
    if(isset($erreur1))
    {
        echo $erreur1;
    }
    if(isset($good))
    {
        echo $good;
    }
    ?>
    </div>
    <?php

Include "footer.php";
echo footer();

?>

</body>
</html>