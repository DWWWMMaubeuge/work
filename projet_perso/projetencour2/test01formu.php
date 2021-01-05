<?php
 $q =  "INSERT INTO users (name,surname,mail,password ) VALUES ( :name, :surname, :mail, :password )";
try 
  {
    $bdd = new PDO("mysql:host=localhost;dbname=utilisateur;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } 
  catch (Exception $e) 
  {
    die("Erreur: " . $e->getMessage());
  }

  if( $_POST && isset($_POST['name']) && $_POST['surname']  && $_POST['mail']  && $_POST['password']  ) 
  {
      $name       = $_POST['name'];
      $surname    = $_POST['surname'];
      $mail       = $_POST['mail'];
      $password   = $_POST['password'];
            
       
        $query = $bdd->prepare( $q);
        $query->bindValue('name', $_POST['name'], PDO::PARAM_STR);
        $query->bindValue('surname', $_POST['surname'], PDO::PARAM_STR);
        $query->bindValue('mail', $_POST['mail'], PDO::PARAM_STR);
        $query->bindValue('password', $_POST['password'], PDO::PARAM_STR);
        
        $query->execute();   

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