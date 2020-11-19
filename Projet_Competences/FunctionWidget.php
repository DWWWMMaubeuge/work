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

function setWidgetValue2t( $skill )
{
    $widget = "<p>".$skill[1]."</p>\n";
    $widget .= "<input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", this.value )\" >\n";
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

<!--- admin  --->


<script>
function inscritFormateur()
{
    {
      var xhttp = new XMLHttpRequest();
      // maj_value.php?idUser=4&idSkill=4&valueSkill=5
      mail = document.getElementById( 'for_mail' ).value;
      if ( mail.length > 5 )
      {
          ID_formation = document.getElementById( 'for_mail_sel' ).value;

          let url = "inscriptFormateur.php?mail="+mail+"&idFormation="+ID_formation;
          xhttp.open("GET", url, true); 
          xhttp.send();
      }
    }   
}

function inscritFormation()
{
    {
      var xhttp = new XMLHttpRequest();
      // maj_value.php?idUser=4&idSkill=4&valueSkill=5
      name = document.getElementById( 'session_name' ).value;
      if ( name.length > 5 )
      {
          ID_formation = document.getElementById( 'for_formation_sel' ).value;
            //inscriptFormation.php?name=miammiam&idFormation=2
          let url = "inscriptFormation.php?name="+name+"&idFormation="+ID_formation;
          console.log( url );
          xhttp.open("GET", url, true); 
          xhttp.send();
      }
    }   
}

</script>