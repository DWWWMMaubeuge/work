
<!DOCTYPE html>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>

  </body>
</html>
  
<?php

include_once("functionConnect.php");
include_once("functionHeader.php");
NavBar2();



function setWidgetValue2( $skill  )   // ID    name 
{
  $widget  = "";
  $widget .= "<p>".$skill[1]."</p>\n";
  $widget .= "<input  id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
 
  return $widget; 
}

function setWidgetValue1( $skill  )   // ID    name 
{
  $widget  = "";
  $widget .= "<div class=\"skills\" >\n";
  $widget .= "<p>".$skill[1]."</p>\n";
  $widget .= "<input id='number' type='range' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
  $widget .= "<p id=\"displaySkill".$skill[0]."\"></p>\n";
  return $widget; 
}


function setAllWidgetValue( $skills  )
{
    $widget  = "";
    $widget .= "<div id='valSkills' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue2( $skill );
    $widget .= "</div>\n";
    return $widget;
}

// Undefined index 'name' et 'surname'
session_start();

$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>Welcome $surname_user</h3>\n";


$req = "SELECT * FROM $DB_dbname.skills";
$result = executeSQL( $req );

$skills = [];
while( $ligne = $result->fetch_assoc())
{
    array_push( $skills, [ $ligne['id'], $ligne[ 'skill' ]   ] );
}
?>

<script>
    function MAJ_Value( id_skill, value  )
    {
                                     
      document.getElementById("displaySkill"+id_skill).innerHTML = ""+value;


      var xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementById("message_validation").innerHTML = "valeur enregistrée";
        }
      };

      xhttp.open("GET", "majValue.php?idSkill="+id_skill+"&valSkill="+value, true);
      xhttp.send();
    }   
</script>


<FORM  method='POST' name="formSkill" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php 

echo "<div class=\"container\" >\n";
echo "<div class=\"row\">";
echo "<div class=\"col-*-*-4\">";
echo setAllWidgetValue( $skills );
echo "</div>\n";
echo "</div>\n";
echo "</div>\n";


 ?>
</FORM>















 
</html>


