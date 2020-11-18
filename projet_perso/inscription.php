<?php
 include_once("function_connect.php");

include_once("header.php");
 echo entete3("comp");  

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
                            if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
                            {
                                $name       = htmlspecialchars($_POST['name']);
                                $surname    = htmlspecialchars($_POST['surname']);
                                $mail       = htmlspecialchars($_POST['mail']);
                                $mail2       = htmlspecialchars($_POST['mail2']);
                                $password   = hash('sha256', $_POST['password']);
                                $password2   = hash('sha256', $_POST['password2']);
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
                            
                                //$good ="<h3>Félicitation vous venez de vous inscrire !<a href='login.php'>cliquez ici pour vous connectez !</a></h3>";
                                header( "location:login.php"); 
                            }
                    
                        else{
                            $erreur2 = "Votre adresses mails doit etre valide !";
                        }
                    }
                        else{
                            $erreur3 = "Vos adresses mails doivent etre identique !";
                        }
                    }
                    else{
                      $erreur5 = "Une même adresse mail existe déja !";
                    }
                }
                else{
                    $erreur4 = "Une même adresse mail existe déja !";
                }
            }
            else{
              $erreur1 = "Vos mots de passes doivent être identique !";
            }
          }
          else{
               $erreur = "Tous les champs doivent etre complétés !";
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
        echo '<span style="color:red;">'.$erreur3.'</span>';
    }
    if(isset($erreur4))
    {
        echo '<span style="color:red;">'.$erreur3.'</span>';
    }
    if(isset($erreur5))
    {
        echo '<span style="color:red;">'.$erreur5.'</span>';
    }
    if(isset($erreur))
    {
        echo '<span style="color:red;">'.$erreur.'</span>';
    }
    if(isset($erreur2))
    {
        echo '<span style="color:red;">'.$erreur2.'</span>';
    }
    if(isset($erreur1))
    {
        echo '<span style="color:red;">'.$erreur1.'</span>';
    }
    /* if(isset($good))
    {
        //return header( "location:login.php");
        echo $good;
    } */
    ?>
    </div>
    <?php

Include "footer.php";
echo footer();

?>

</body>
</html>