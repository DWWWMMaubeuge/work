<?php
include_once("functionConnect.php");


if( $_POST && isset($_POST['skill'])  ) 
{
    $skills       = $_POST['skill'];
 

    // attention aux doublons des mail

    $req = "INSERT INTO skills.skills ( skill ) VALUES ( '$skills' )";
    executeSQL( $req );
    header( "location: skills.php");
}

?>

<!DOCTYPE html>
<html>
<body>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
</head>

<div class="login-box">
<h2>Skills</h2>
<form action="/skills.php">
  <div class="textskill">
  <label for="html">HTML:</label>
  <input type="range" id="html" name="html" min="0" max="10" >
  </div>
  <div class="textskill">
  <label for="css">CSS:</label>
  <input type="range" id="css" name="css" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="JavaScript">JavaScript:</label>
  <input type="range" id="JavaScript" name="JavaScript" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="PHP ">PHP:</label>
  <input type="range" id="PHP" name="PHP" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="AJAX">AJAX:</label>
  <input type="range" id="ajax" name="ajax" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="Jquery">Jquery:</label>
  <input type="range" id="jquery" name="jquery" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="Responsive">Responsive:</label>
  <input type="range" id="responsive" name="responsive" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="sql">SQL:</label>
  <input type="range" id="sql" name="sql" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="composer">Composer:</label>
  <input type="range" id="composer" name="composer" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="symfony">Symfony:</label>
  <input type="range" id="symfony" name="symfony" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="doctrine">Doctrine:</label>
  <input type="range" id="doctrine" name="doctrine" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="twig">Twig:</label>
  <input type="range" id="twig" name="twig" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="agile">Agile:</label>
  <input type="range" id="agile" name="agile" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="git">GIT:</label>
  <input type="range" id="git" name="git" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="python">Python:</label>
  <input type="range" id="python" name="python" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="seo">SEO:</label>
  <input type="range" id="seo" name="seo" min="0" max="10">
 </div>
  <div class="textskill">
  <label for="rgpd">RGPD:</label>
  <input type="range" id="rgpd" name="rgpd" min="0" max="10">
 </div>
  <div class="textskill">
  <input class="btn" type="submit">
</form>
</div>
</body>
</html>




