<?php

include_once(  "CO_functions.php"  );
echo "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";


if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    $req = "INSERT INTO flavia.users( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL( $req );
    header( "location: homePage.php");
    
}
$comboBox = "<select name=\"skills\">\n";
while ( $row = $result->fetch_assoc() )
{	
  $comboBox .= "<option value=\"".$row[ 'id' ]."\">".$row[ 'langages' ]."</option>\n"; 
}


$comboBox .= "</select><br>\n";

?>
<h1> compétences </h1>
<?php

  $req = "SELECT * FROM flavia.skills;"; 
  $result = executeSQL( $req );

  /*
  $radioButton = "";
  while ( $row = $result->fetch_assoc() )
  {	
    $radioButton .= "<input type=\"radio\" id=\"".$row[ 'id' ]."\" name=\"marque_voiture\" value=\"".$row[ 'nom' ]."\">\n";
    $radioButton .= " <label for=\"".$row[ 'nom' ]."\">".$row[ 'nom' ]."</label><br>\n";
  }
  */

  $comboBox = "<select name=\"langages\">\n";
  while ( $row = $result->fetch_assoc() )
  {	
    $comboBox .= "<option value=\"".$row[ 'id' ]."\">".$row[ 'langages' ]."</option>\n"; 
  }
  
  
  $comboBox .= "</select><br>\n";
  
  echo $comboBox; 
  
  echo "<input id=\"number\" type=\"number\" value=\"0\" name=\"HTML\" min=\"0\" max=\"10\">\n";
  ?>