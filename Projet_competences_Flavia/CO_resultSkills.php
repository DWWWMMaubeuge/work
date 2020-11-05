<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Résultats de vos compétences</title>
    <link rel="stylesheet" href=CO_style.css>
    <a href="CO_logout.php">Déconnexion</a>
    <br>
  </head>
  
 
  <?php
  // On vérifie si la variable existe et sinon elle vaut NULL
$user = isset($_POST['user']) ? $_POST['user'] : NULL;
$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$html = isset($_POST['html']) ? $_POST['html'] : NULL;
$css = isset($_POST['css']) ? $_POST['css'] : NULL;
$js = isset($_POST['js']) ? $_POST['js'] : NULL;
$php = isset($_POST['php']) ? $_POST['php'] : NULL;
$ajax = isset($_POST['ajax']) ? $_POST['ajax'] : NULL;
$jquery = isset($_POST['jquery']) ? $_POST['jquery'] : NULL;
$responsive = isset($_POST['responsive']) ? $_POST['responsive'] : NULL;
$composer = isset($_POST['composer']) ? $_POST['composer'] : NULL;
$symfony = isset($_POST['symfony']) ? $_POST['symfony'] : NULL;
$doctrine = isset($_POST['doctrine']) ? $_POST['doctrine'] : NULL;
$twig = isset($_POST['twig']) ? $_POST['twig'] : NULL;
$agile = isset($_POST['agile']) ? $_POST['agile'] : NULL;
$git = isset($_POST['git']) ? $_POST['git'] : NULL;
$python = isset($_POST['python']) ? $_POST['python'] : NULL;
$seo = isset($_POST['seo']) ? $_POST['seo'] : NULL;
$rgpd = isset($_POST['rgpd']) ? $_POST['rgpd'] : NULL;
  
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flavia";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = 'INSERT INTO flavia.skills (id, user, email,html,css, js, php, ajax, jquery,responsive,composer,symfony,doctrine,twig,agile,git,python,seo,rgpd) 
VALUES("", "'.$user.'", "'.$email.'", "'.$html.'", "'.$css.'", "'.$js.'", "'.$php.'", "'.$ajax.'", "'.$jquery.'", "'.$responsive.'", "'.$composer.'", "'.$symfony.'", "'.$doctrine.'", "'.$twig.'", "'.$agile.'", "'.$git.'", "'.$python.'", "'.$seo.'", "'.$rgpd.'")';

if ($conn->query($sql) === TRUE) {
    echo "Merci , vos données ont bien étés transmis.";
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();  


  echo("<center>Ton niveau en HTML: $html/10</center><br>");
  echo("<center>Ton niveau en CSS: $css/10</center><br>");
  echo("<center>Ton niveau en JS: $js/10</center><br>");
  echo("<center>Ton niveau en PHP: $php/10</center><br>");
  echo("<center>Ton niveau en AJAX: $ajax/10</center><br>");
  echo("<center>Ton niveau en JQUERY: $jquery/10</center><br>");
  echo("<center>Ton niveau en RESPONSIVE: $responsive/10</center><br>");
  echo("<center>Ton niveau en COMPOSER: $composer/10</center><br>");
  echo("<center>Ton niveau en SYMFONY: $symfony/10</center><br>");
  echo("<center>Ton niveau en DOCTRINE: $doctrine/10</center><br>");
  echo("<center>Ton niveau en TWING: $twig/10</center><br>");
  echo("<center>Ton niveau en AGILE: $agile/10</center><br>");
  echo("<center>Ton niveau en GIT: $git/10</center><br>");
  echo("<center>Ton niveau en PYTHON: $python/10</center><br>");
  echo("<center>Ton niveau en SEO: $seo/10</center><br>");
  echo("<center>Ton niveau en RGPD: $rgpd/10</center><br>");

  ?>

<br>
<footer> Formulaire de compétences  @2020</footer>

</body>

  
</html>