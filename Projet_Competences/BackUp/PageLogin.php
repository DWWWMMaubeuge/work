<?php
include "Serveur.php";
include "Entete.php";
HEAD("Page de Log");



/*session_start();
$_SESSION[ 'ID_user' ]  = 0;

$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>bonjour $surname_user</h3>\n";
*/

?>

<body>

<?php if(isset($messageerreur)) { ?>
<div class="erreur"><?= $messageerreur; ?></div>
<?php } ?>

<div class="login-box">
<form method="POST" action="PageLogin.php">
	<?php include "Erreur.php"; ?>   
	<div class="bg-image"></div>
	<h1>Connection</h1>
  	<div class="input-group">
  		<i class="fa fa-user"></i>
  		<input type="text" name="surname" placeholder="Ton nom">
    </div>
    <div class="input-group">
        <i class="fas fa-envelope"></i>
        <INPUT type='text' name='mail' placeholder="Ton mail">
  	</div>
  	<div class="input-group">
        <i class="fa fa-lock" aria-hidden="true"></i>
  		<input type="password" placeholder="Ton password" name="password">
	  </div>

	  <table>
    <tr>
      <td>
        <label>Entrer le texte dans l'image</label>
        <input name="captcha" type="text">
        <img src="captcha.php" style="vertical-align: middle;"/>
      </td>
    </tr>
    </table>

  	<div class="input-group">
  		<button class="btn" type="submit" name="login_user">Log toi!</button>
  	</div>
  	<p>
  		 Pas encore membre? <a href="PageInscription.php">Inscrit toi!</a>
  	</p>
  </form>
</div>
</body>
</html>


