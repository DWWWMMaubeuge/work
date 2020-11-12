<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["surname"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="../admin.css" />
  </head>
  <body>
  <div class="login-box">
    <h1>Welcome <?php echo $_SESSION['surname']; ?>!</h1>
    <p>Admin panel</p>
    <div class="admin">
    <a href="addUser.php" >Add trainee</a> |
    <a href="#" >Display trainees</a> | 
    <a href="#" >Display results trainees</a> | 
    <a href="#" >Update trainee</a> | 
    <a href="#" >Delete trainee</a> | 
    <a href="../logOut.php" >Logout</a>
    </div>
    </div>
  </body>
</html>