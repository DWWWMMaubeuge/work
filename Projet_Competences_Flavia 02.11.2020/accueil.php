<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Résultats de vos compétences</title>
    <link rel="stylesheet" href=form.css>
  </head>
  
  <body>

  <header></header>
  <h1>Bienvenue</h1>
  
  <input type="button" width="100px" height="40px" name="valider" value="Liste des utilisateurs inscrits" onclick="window.location.href='sql.php';">
  <hr>
  <?php
  
  // On vérifie si la variable existe et sinon elle vaut NULL
$nom = isset($_POST['nom']) ? $_POST['nom'] : NULL;
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : NULL;
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
$dbname = "bdformulaire";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = 'INSERT INTO bdformulaire.utilisateurs (id, nom, prenom, email,html,css, js, php, ajax, jquery,responsive,composer,symfony,doctrine,twig,agile,git,python,seo,rgpd) 
VALUES("", "'.$nom.'", "'.$prenom.'", "'.$email.'", "'.$html.'", "'.$css.'", "'.$js.'", "'.$php.'", "'.$ajax.'", "'.$jquery.'", "'.$responsive.'", "'.$composer.'", "'.$symfony.'", "'.$doctrine.'", "'.$twig.'", "'.$agile.'", "'.$git.'", "'.$python.'", "'.$seo.'", "'.$rgpd.'")';

if ($conn->query($sql) === TRUE) {
    echo "Vos données ont bien étés envoyés.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();  
  
  echo("<center>Ton nom est: $nom</center><br>");
  echo("<center>Ton prénom est: $prenom</center><br>");
  echo("<center>Ton email est: $email</center><br>"); 
  echo("<center>Ton niveau en html est: $html/10</center><br>");
  echo("<center>Ton niveau en css est: $css/10</center><br>");
  echo("<center>Ton niveau en js est: $js/10</center><br>");
  echo("<center>Ton niveau en php est: $php/10</center><br>");
  echo("<center>Ton niveau en ajax est: $ajax/10</center><br>");
  echo("<center>Ton niveau en jquery est: $jquery/10</center><br>");
  echo("<center>Ton niveau en responsive est: $responsive/10</center><br>");
  echo("<center>Ton niveau en composer est: $composer/10</center><br>");
  echo("<center>Ton niveau en symfony est: $symfony/10</center><br>");
  echo("<center>Ton niveau en  doctrine est: $doctrine/10</center><br>");
  echo("<center>Ton niveau en twing  est: $twig/10</center><br>");
  echo("<center>Ton niveau en  agile est: $agile/10</center><br>");
  echo("<center>Ton niveau en  git est: $git/10</center><br>");
  echo("<center>Ton niveau en python est: $python/10</center><br>");
  echo("<center>Ton niveau en seo  est: $seo/10</center><br>");
  echo("<center>Ton niveau en  rgpd est: $rgpd/10</center><br>");

  ?>
  <hr>

<br>
<footer> Formulaire compétences  @2020</footer>

</body>

</html>
  </body>
  
</html>