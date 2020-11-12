<?php 
  session_start(); 

  if (!isset($_SESSION['surname'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: PageLogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['surname']);
  	header("location: PageLogin.php");
  }
?>

<?php
include "Entete.php";
HEAD2("Page Admin");

?>


<body>






<div class="login-box">
        <h1>Bien le bonjour <?php echo $_SESSION['surname']; ?>!</h1>
        <p>Admin Home</p>
    <div class="admin">
        <a href="addUser.php" >Add user</a> | 
        <a href="#" >Update user</a> | 
        <a href="#" >Delete user</a> | 
        <a href="logOut.php" >Logout</a>
    </div>
</div>








  </body>








</html>