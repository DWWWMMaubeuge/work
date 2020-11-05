<?php
include "Entete.php";
HEAD("Page d'inscription");
include_once(  "Connect.php"  );


session_start();
$_SESSION[ 'ID_user' ]  = 0;
/*
$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>bonjour $surname_user</h3>\n";
*/

?>

<body>
    
<div class="login-box">
<form method="POST" action="<?=$_SERVER['PHP_SELF']; ?>">
        <?php include('Erreur.php'); ?>
    <div class="bg-image">
    </div>
  	<div class="input-group">
  		<i class="fa fa-user"></i>
  		<input type="text" name="username" placeholder="Ton username" >
    </div>
    <div class="input-group">
        <i class="fas fa-envelope"></i>
        <INPUT type='text' name='mail' placeholder="Ton Mail">
  	</div>
  	<div class="input-group">
        <i class="fa fa-lock" aria-hidden="true"></i>
  		<input type="password" placeholder="password" name="Ton password">
  	</div>
  	<div class="input-group">
  		<button class="btn" type="submit" name="btn">Log toi!</button>
  	</div>
  	<p>
  		 Pas encore membre? <a href="PageInscription.php">Inscrit toi!</a>
  	</p>
  </form>
</div>
</body>
</html>


