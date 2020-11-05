<?php

function setWidgetValue2( $skill  )
{

  $widget = "<p>".$skill[1]."</p><input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
  return $widget;
  
  
}


function setAllWidgetValue( $skills  )
{
    $widget = "<div id='valSkills' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue2( $skill );
    $widget .= "</div>\n";
    return $widget;
}



?>
