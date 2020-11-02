<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Liste des utilisateurs inscrits</title>
    <link rel="stylesheet" href=form.css>
  </head> 
  <body>
  <header></header>
  <h1>Liste des utilisateurs inscrits</h1>
  <?php
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
//echo "Connected successfully"; 

$sql = 'SELECT * FROM bdformulaire.utilisateurs ORDER BY id';
$result = $conn->query($sql);



if ($result->num_rows > 0) {
   echo('<table border="1">
    <colgroup width =150 span=12></colgroup>
	   <thead> <!-- En-tête du tableau -->
    <tr>
    <th>Id</th>
     <th>Nom</th>
     <th>Prénom</th>
	   <th>Email</th>
     <th>HTML</th>
     <th>CSS</th>
     <th>JS</th>
     <th>PHP</th>
     <th>AJAX</th>
     <th>JQUERY</th>
     <th>RESPONSIVE</th>
     <th>COMPOSER</th>
     <th>SYMFONY</th>
     <th>DOCTRINE</th>
     <th>TWIG</th>
     <th>AGILE</th>
     <th>GIT/th>
     <th>PYTHON</th>
     <th>SEO</th>
     <th>RGPD</th>
       </tr>
    </thead>
	<tbody> <!-- Corps du tableau --> ');
    while($donnees = $result->fetch_assoc()) {
        echo ('<tr>');
       echo ('<td>'.$donnees['id'].'</td>');
       echo ('<td>'.$donnees['nom'].'</td>');
       echo ('<td>'.$donnees['prenom'].'</td>');
       echo ('<td>'.$donnees['email'].'</td>');
       echo ('<td>'.$donnees['html'].'</td>');
       echo ('<td>'.$donnees['css'].'</td>');
       echo ('<td>'.$donnees['js'].'</td>');
       echo ('<td>'.$donnees['php'].'</td>');
       echo ('<td>'.$donnees['ajax'].'</td>');
       echo ('<td>'.$donnees['jquery'].'</td>');
       echo ('<td>'.$donnees['responsive'].'</td>');
       echo ('<td>'.$donnees['composer'].'</td>');
       echo ('<td>'.$donnees['symfony'].'</td>');
       echo ('<td>'.$donnees['doctrine'].'</td>');
       echo ('<td>'.$donnees['twig'].'</td>');
       echo ('<td>'.$donnees['agile'].'</td>');
       echo ('<td>'.$donnees['git'].'</td>');
       echo ('<td>'.$donnees['python'].'</td>');
       echo ('<td>'.$donnees['seo'].'</td>');
       echo ('<td>'.$donnees['rgpd'].'</td>');
       echo('</tr>');
   }
       echo('<tbody>');
       echo('</table>');
} else {
    echo "0 results";
}
$conn->close();

       
  ?>

<br><br>
<form action="sql.php" method="post">
<input type="submit" name="valider" value=" Actualiser ">
<input type="button" width="100px" height="40px" name="valider" value=" Ajouter un utilisateur" onclick="window.location.href='formulaire.html';">
</form>
  <hr>
  
  </body>
  
</html>