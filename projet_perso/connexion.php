<?php
try 
  {
    $bdd = new PDO("mysql:host=localhost;dbname=utilisateur;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } 
  catch(Exception $e) 
  {
    die("Erreur: " . $e->getMessage());
  }

  if( $_POST && isset($_POST['name']) && isset($_POST['surname'])  && isset($_POST['mail'])  && isset($_POST['password'])  ) 
  {
        $name       = $_POST['name'];
        $surname    = $_POST['surname'];
        $mail       = $_POST['mail'];
        $password   = $_POST['password'];
        $query = $bdd->prepare("INSERT INTO users(name,surname,mail,password ) VALUES( :name, :surname, :mail, :password )");
        $query->execute(array(
        "name"=>$_POST["name"],
        "surname"=>$_POST["surname"],
        "mail"=>$_POST["mail"],
        "password"=>$_POST["password"]
        ));
        header( "location:accueil.php");
  }
?>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='name' placeholder="votre nom ici">
<br>
<INPUT type='text' name='surname' placeholder="votre prenom">
<br>
<INPUT type='text' name='mail' placeholder="votre mail">
<br>
<INPUT type='text' name='password' placeholder="votre mot de passe">
<br>
<INPUT type='submit' value='OK'>
</FORM>