<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            
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
  
  margin-left: 80px;
  margin-top: 20vh;
  border-radius:25px;
  max-width:600px;
 
 
}

body {
  background: url(img/bg.jpg) no-repeat;
  background-size: cover;

}
 .enter{
   margin-top: 15px;
   padding-right: 70px;
}

.a{
  margin-top: 15px;
  padding-right: 70px;
  
}
a{
    color: white;
}
.inscr{
text-align:right;
}
.pad{
    padding-right: 70px;
}
h1{
    padding-right: 90px;
    
}
label{
    color: white;
}
    </style>

</head>
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
            </div class="pad">
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
    </div>

</body>
</html>



    <!-- if(isset($_POST['forminscription']))
        {
          echo "ok"
        }
        if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['password']) && !empty($_POST['password2']) )
        {
          echo "ok";
        } -->