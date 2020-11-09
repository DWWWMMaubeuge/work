<?php
include_once("function_connect.php");
include_once("header.php");
echo entete3("inscription");

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

<body>
    <div class="formulaire container" >
      <FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class=""></div>
        <h1>Inscription</h1>
        <div>
            <div>
              <INPUT type='text' name='name' placeholder="saisir votre nom ici">
            </div>
            <div>
              <INPUT type='text' name='surname' placeholder=" saisir votre prenom">
            </div>
            <div>
              <INPUT type='text' name='mail' placeholder="saisir votre mail">
            </div>
            <div>
              <INPUT type='text' name='password' placeholder="saisir votre mot de passe">
            </div>
            <div class="enter">
              <INPUT type='submit' value='Entrer'>
            </div>
          </div>
      </FORM>
    </div>
</body>

