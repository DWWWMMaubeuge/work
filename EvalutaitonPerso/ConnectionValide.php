<form action='' method="post">
	<h3>Se connecter</h3> 
	<input type='text' Name='email' placeholder="Email"><br />
	<input type='password' Name='pass' placeholder="Mot de passe"><br />
	<input type='submit' name='submit' value="Me connecter"">

	<?php 
	if (isset($_POST['submit']))
	{
		if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_POST['email']))
		{
			include ('../bdd/login.bdd');

			$email = addslashes(htmlspecialchars($_POST['email']));
			$pass_hash = sha1($_POST['pass']);

			$req = $bdd->prepare('SELECT id FROM membres WHERE email = :email AND pass = :pass');
			$req->execute(array(
			    'email' => $email,
			    'pass' => $pass_hash));

			$resultat = $req->fetch();

			if (!$resultat)
			{
				$email = addslashes(htmlspecialchars(''));
			    echo 'Les identifiants que vous avez saisis ne sont pas valides !';
			}

			else
			{
			    session_start();
			    $_SESSION['id'] = $resultat['id'];
			    $_SESSION['email'] = $email;
			    $_SESSION['pass_hash'] = $pass_hash;
			    header('Location: ../pages/compte.php');
			}
		}

		elseif (empty($_POST['email']) AND empty($_POST['pass']))
		{
			echo 'Vous n\'avez pas saisis d\'identifiants';
		}

		elseif (empty($_POST['email']))
		{
			echo 'Vous n\'avez pas renseigné votre email';
		}

		else 
		{
			echo 'L\'adresse email saisit n\'est pas valide !';
		}
	}
	?>
</form>