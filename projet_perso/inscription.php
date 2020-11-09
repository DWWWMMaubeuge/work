<?php
include_once("function_connect.php");
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

        $bdd = null;
        header( "location:login.php"); 

  }



?>

<div class="formulaire">
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class=""></div>
<h1>Inscription</h1>
<INPUT type='text' name='name' placeholder="saisir votre nom ici">
<br>
<INPUT type='text' name='surname' placeholder=" saisir votre prenom">
<br>
<INPUT type='text' name='mail' placeholder="saisir votre mail">
<br>
<INPUT type='text' name='password' placeholder="saisir votre mot de passe">
<br>
<INPUT type='submit' value='Entrer'>
</FORM>
</div>












<style>
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  text-align: center;
}

input{
  margin-top: auto;
  margin-left: auto;
}

.formulaire {
  border-radius: 5px;
  background-color: #313137 ;
  padding: 20px;
  text-align: center;
  margin-top: 20vh;
 
 
}
body {
  background: url(img/bg.jpg) no-repeat;
  background-size: cover;

}
</style>