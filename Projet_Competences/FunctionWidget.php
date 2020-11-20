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
function inscritFormateur2Formation()
{
    {
      var xhttp = new XMLHttpRequest();

      mail = document.getElementById( 'for_mail' ).value;
      ID_formation = document.getElementById( 'for_mail_sel' ).value;

      if ( mail.length > 5 && ID_formation > 0 )
      {

          let url = "inscriptFormateur2FormationGET.php?mail="+mail+"&idFormation="+ID_formation;
          xhttp.open("GET", url, true); 
          xhttp.send();
      }
    }   
}


function inscritFormateur2Session()
{
    {
      var xhttp = new XMLHttpRequest();
      // maj_value.php?idUser=4&idSkill=4&valueSkill=5
      mail = document.getElementById( 'for_mail_f2s' ).value;
      ID_session = document.getElementById( 'session_sel_f2s' ).value;
      if ( mail.length > 5 && ID_session > 0 )
      {
          let url = "inscriptFormateur2SessionGET.php?mail="+mail+"&idSession="+ID_session;
          xhttp.open("GET", url, true); 
          xhttp.send();
      }
    }   
}



function inscritSession()
{
        var xhttp = new XMLHttpRequest();
        // maj_value.php?idUser=4&idSkill=4&valueSkill=5
        name = document.getElementById( 'session_name' ).value;
        date_begin = document.getElementById( 'session_date_b' ).value;
        date_end = document.getElementById( 'session_date_e' ).value;
        ID_formation = document.getElementById( 'for_formation_sel' ).value;
        console.log( date_begin +" "+ date_end +" "+ ID_formation );

        if ( name.length > 10 && ID_formation > 0 && date_begin.length > 5 && date_end.length > 5 )
        {
                //inscriptFormation.php?name=miammiam&idFormation=2
                let url = "inscriptFormation.php?name="+name+"&idFormation="+ID_formation+"&dateb="+date_begin+"&datee="+date_end;
                
                console.log( url );
                xhttp.open("GET", url, true); 
                xhttp.send();
        }   
}

function inscritStagiaire()
{
        return;
        var xhttp = new XMLHttpRequest();
        // maj_value.php?idUser=4&idSkill=4&valueSkill=5
        list_stagiaire = document.getElementById( 'list_stagiaire' ).value;
        ID_session = document.getElementById( 'session_sel' ).value;

        //console.log( date_begin +" "+ date_end +" "+ ID_formation );

        if ( list_stagiaire.length > 5 && ID_session > 0 )
        {
                //inscriptFormation.php?name=miammiam&idFormation=2
                let url = "inscriptStagiaireGET.php?list_stagiaire="+list_stagiaire+"&idSession="+ID_session;
                
                console.log( url );
                xhttp.open("GET", url, true); 
                xhttp.send();
        }   
}

</script>