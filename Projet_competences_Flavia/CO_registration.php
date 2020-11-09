<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="CO_style.css" />
</head>
<body>
<?php
require('CO_bdd.php');
if (isset($_REQUEST['user'], $_REQUEST['email'], $_REQUEST['password'])){
  $user = stripslashes($_REQUEST['user']);
  $user = mysqli_real_escape_string($conn, $user); 

  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);

  
  //requéte SQL + mot de passe crypté
    $query = "INSERT into flavia.users (user, email, password)
              VALUES ('$user', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='CO_login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Inscrivez-vous</h1>
	<input type="text" class="box-input" name="user" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="CO_login.php">Connectez-vous ici</a></p>
    <div class="p-5">


</body>
</html>
<?php } ?>
</body>
</html>



