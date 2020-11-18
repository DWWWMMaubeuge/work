<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["surname"])){
    header("Location: CO_login.php");
    exit(); 
  }


  
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="CO_style.css" />
  </head>
  <body>
  <div class="login-box">
    <h1>Welcome <?php echo $_SESSION['surname']; ?>!</h1>
    <p>Admin panel</p>
    <div class="admin">
    <a href="CO_addUser.php" >Ajouter un utilisateur</a> |
    <a href="#" >Add training</a> |
    <a href="CO_AfficheUser.php" >Display user</a> | 
    <a href="#" >Update user</a> | 
    <a href="#" >Delete user</a> | 
    <a href="CO_logout.php" >Deconnexion</a>
    </div>
    </div>
  </body>
</html>