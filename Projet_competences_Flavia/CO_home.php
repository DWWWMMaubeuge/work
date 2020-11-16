﻿<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["user"])){
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
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['user']; ?>!</h1>
		<p>Evaluez vos compétences</p>
		</div>

<br><br>
<form action="CO_resultSkills.php" method="post">
<div class="skill">
<label>HTML</label>
<br>
<input type="range" name="html" value="" max="10" min="0" step="1"></input>
<br>
<label>CSS</label>
<br>
<input type="range" name="css" value="" max="10" min="0" step="1"></input>
<br>
<label>JS</label>
<br>
<input type="range" name="js" value="" max="10" min="0" step="1"></input>
<br>
<label>PHP</label>
<br>
<input type="range" name="php" value="" max="10" min="0" step="1"></input>
<br>
<label>AJAX</label>
<br>
<input type="range" name="ajax" value="" max="10" min="0" step="1"></input>
<br>
<label>JQUERY</label>
<br>
<input type="range" name="jquery" value="" max="10" min="0" step="1"></input>
<br>
<label>RESPONSIVE</label>
<br>
<input type="range" name="responsive" value="" max="10" min="0" step="1"></input>
<br>
<label>COMPOSER</label>
<br>
<input type="range" name="composer" value="" max="10" min="0" step="1"></input>
<br>
<label>SYMFONY</label>
<br>
<input type="range" name="symfony" value="" max="10" min="0" step="1"></input>
<br>
<label>DOCTRINE</label>
<br>
<input type="range" name="doctrine" value="" max="10" min="0" step="1"></input>
<br>
<label>TWIG</label>
<br>
<input type="range" name="twig" value="" max="10" min="0" step="1"></input>
<br>
<label>AGILE</label>
<br>
<input type="range" name="agile" value="" max="10" min="0" step="1"></input>
<br>
<label>GIT</label>
<br>
<input type="range" name="git" value="" max="10" min="0" step="1"></input>
<br>
<label>PYTHON</label>
<br>
<input type="range" name="python" value="" max="10" min="0" step="1"></input>
<br>
<label>SEO</label>
<br>
<input type="range" name="seo" value="" max="10" min="0" step="1"></input>
<br>
<label>RGPD</label>
<br>
<input type="range" name="rgpd" value="" max="10" min="0" step="1"></input>
<br>
</div>
<br><br>
<input type="submit" name="valider" value=" Valider "> 
<a href="CO_logout.php">Déconnexion</a>

		</div>

		<footer> Formulaire de compétences  @2020</footer>

	</body>
</html>