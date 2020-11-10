<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );




function setWidgetValue2( $skill  )
{
    $widget = "<div class ='col-4 mb-3'><p>".$skill[1]."</p><input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\"></div>\n";
    return $widget;
}



function setWidgetValue2( $skill  )
{
    $comboBox=$widget = <select name ="<p>".$skill[1]."</p><input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\"></div>\n";>
    return $widget;







/* function setWidgetValue( $skill )
{
    $widget = "<p>".$skill[1]."</p><input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", this.value )\" >\n";
    return $widget;
} */


function setAllWidgetValue( $skills  )
{
    $widget = "<div id='valSkills' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue2( $skill );
    $widget .= "</div>\n";
    return $widget;
}



session_start();
$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h1>welcome  $surname_user</h1>\n";


$req = "SELECT* FROM $DB_dbname.skills";
$result = executeSQL( $req );

$skills = [];
while( $data = $result->fetch_assoc())
{
    array_push( $skills, [ $data['id'], $data[ 'name']   ] );
}

//print_r( $skills );


?>
<script>
    function MAJ_Value( id_skill, value  )
    {
      var xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementById("message_validation").innerHTML = "valeur enregistrée";
        }
      };

      xhttp.open("GET", "maj_value.php?idSkill="+id_skill+"&valSkill="+value, true);
      xhttp.send();
    }   
</script>


<FORM  method='POST' name="formSkill" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<?php echo setAllWidgetValue( $skills ); ?>
   

</FORM>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>