<?php


function setWidgetValue2( $skill  )   // ID    name 
{
  $widget  = "";
  $widget .= "<div class=\"skills col-xs-12 col-sm-12 col-md-3\">\n";
  $widget .= "<p>".$skill[1]."</p>\n";
  $widget .= "<input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
  $widget .= "</div>\n";
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
    $widget .= "<div id='valSkills' class='row d-flex justify-content-around' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue2( $skill );
    $widget .= "</div>\n";
    return $widget;
}

?>
