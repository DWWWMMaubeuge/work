<?php 

function setWidgetValue( $skill ) {
    
    if(is_null($skill[2])) {
        $value = 0;
    } else {
        $value = $skill[2];
    }

    $widget = "<div class='m-5'><p>".$skill[1]."</p><input type='range'  value='" . $value ."' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", this.value, " . $_SESSION['id'] . " )\" ></div>";
    return $widget;

}

function setWidgetValue2( $skill  ) {
    
    if(is_null($skill[2])) {
        
        $value = 0;
        
    } else {
        
        $value = $skill[2];
        
    }
    
    $widget = "<div class='m-5'><p>".$skill[1]."</p><input id='number' type='number' value='" . $value ."' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value, " . $_SESSION['id'] . " )\"></div>";
    return $widget;
}


function setAllWidgetValue( $skills  ) {

    $widget = "<div id='valSkills' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue( $skill );
    $widget .= "</div>";
    return $widget;

}

?>