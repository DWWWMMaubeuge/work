<!DOCTYPE html>
<html lang="fr">   
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/30abe9456d.js" crossorigin="anonymous"></script>
    <title>Accueil02</title>
</head>
<body>
<!-- <div class="sucess">

<div class="btn">
<span class="noselect">< Evaluation </span>
</div>
<p><C'est votre tableau de bord. </p> -->



<a href="logout.php"><h4><i class="fas fa-sign-out-alt"></i></h4></a>


<?php
require_once "parametres.php";
include_once "CO_global_functions.php";

session_start();

if (!isset($_SESSION["surname"])) 
 {
    header("Location: Login.php");
 }

    $ID_user       = $_SESSION['ID_user'];
    $id_formation  = $_SESSION['id_formation'];
    $name_user     = $_SESSION['name'];
    $surname_user  = $_SESSION['surname'];



/* function setWidgetValuex( $skill  )
{
$widget = "<div ><p>".$skill[1]."</p><input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\"></div>\n";
return $widget;
} */

function setWidgetValue2($skill)
{

    $widget = "<div class =\"styled\"  >\n";

        $widget .= "<p>" . $skill[1] . "</p>\n";

        $widget .= "<p id=\"aff" . $skill[0] . "\"></p>\n";

        $widget .= "<select class=\"lol\" id=\"lol" . $skill[0] . "\" name=\"valSkill\" onchange=\"MAJ_Value( ". $skill[0] .", this.value )\">\n";
        $widget .= "<option value=0 class=\"lool\"></option>\n";
        for ($a = 1; $a < 11; $a++) 
        {
            $widget .= "<option value=\"$a\">$a</option>\n";
        }
        $widget .= "</select><br>\n";

    $widget .= "</div>\n";
    

    return $widget;
}


 
/*
function setWidgetValue2( $skill  )   // ID    name
{
$widget  = "";
$widget .= "<div class=\"skills\" >\n";
$widget .= "<p>".$skill[1]."</p>\n";
$widget .= "<input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
$widget .= "</div>\n";
return $widget;
}
function 
 */

/* function setWidgetValue( $skill )
{
$widget = "<p>".$skill[1]."</p><input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", this.value )\" >\n";
return $widget;
} */

function setAllWidgetValue($skills)
{
    $widget = "<div class='skill' >\n";
    foreach ($skills as $skill) 
    {
        $widget .= setWidgetValue2($skill);
    }

    $widget .= "</div>\n";
    return $widget;
}



echo "<h1> Bienvenue \"$surname_user\" sur le site d'évaluation </h1>\n";

$req = "SELECT* FROM $DB_dbname.skills where id_formation= $id_formation" ;
$result = executeSQL($req);

$skills = [];
while ($data = $result->fetch_assoc()) 
{
    array_push($skills, [ $data['id'], $data['name']]);
}

//print_r( $skills );

?>
<script>
    function MAJ_Value( id_skill, value  )
    {
      document.getElementById("aff"+id_skill).innerHTML = value;
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() 
      {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("message_validation").innerHTML = "valeur enregistrée";
            }
      };

      xhttp.open("GET", "maj_value.php?idUser=<?=$ID_user?>&idSkill="+id_skill+"&valSkill="+value, true);
      xhttp.send();
    }
</script>


<FORM  method='POST' name="formSkill" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class=" container">
<?=setAllWidgetValue($skills)?>
</div>

</FORM>

<p id="message_validation"></p>

</body>

</html>

