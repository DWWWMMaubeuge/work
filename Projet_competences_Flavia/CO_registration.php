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
    <form id="contact-form" method="post" action="contact.php">
					<div class="form-group row">
						<div class="col-sm-10">
							<div class="form-row align-items-center">
								<div class="col mb-3">
                  <input type="text" class="form-control" name="token" id="token" placeholder="Inserez le code à 4 caractères" style="min-width: 150px;">
									<img src="captcha/image.php?12325" alt="CAPTCHA" id="image-captcha">
									<a href="#" id="refresh-captcha" class="align-middle" title="refresh"><i class="material-icons align-middle">refresh</i></a>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary" name="submit" id="submit">GO!</button>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var refreshButton = document.getElementById("refresh-captcha");
		var captchaImage = document.getElementById("image-captcha");
		refreshButton.onclick = function(event) {
			event.preventDefault();
			captchaImage.src = 'captcha/image.php?' + Date.now();
		}
	</script>

</body>
</html>
<?php } ?>
</body>
</html>



