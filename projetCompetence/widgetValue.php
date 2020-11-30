<?php 
session_start();

function setWidgetValue2( $skill  )   // ID    name 
{
  
  $widget  = "<div class='col-4'>";
  $widget .= "<label for=".$skill[0]." style = 'width:6rem'>".$skill[1]."</label>\n";
  $widget .= "<input id=".$skill[0]." type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
  $widget .= "</div>";
  return $widget; 

}



function setAllWidgetValue( $skills )
{
    $widget  = "";
  
    foreach( $skills as $skill )
        $widget .= setWidgetValue2( $skill );
 
    return $widget;
}

// Undefined index 'name' et 'surname'


$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>Welcome $surname_user</h3>\n";


$req = "SELECT * FROM $DB_dbname.skills";
$result = executeSQL( $req );

$skills = [];
while( $row = $result->fetch_assoc())
{
    array_push( $skills, [ $row['id'], $row[ 'skill' ]   ] );
}

?>