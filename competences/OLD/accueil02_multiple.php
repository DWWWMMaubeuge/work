<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );


//https://www.jqueryscript.net/other/slot-machine-picker-drum.html
//https://www.jqueryscript.net/tags.php?/select/
function setWidgetValue2( $skill  )
{
    $widget ="<select class=\"valSkillSelector\">\n";
    for( $a=1 ; $a<11 ; $a++ )
        $widget .="<option>$a</option>\n";
        //$widget .="<option value=\"$a\">$a</option>\n";
    $widget .="</select>\n";


    return $widget;
}


function setWidgetValue2y( $skill  )
{
    $widget ="<p>".$skill[1]."</p><select name=\"valSkill\" onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
    //$widget .="<option value=\"\">--Please choose an option--</option>\n";
    for( $a=1 ; $a<11 ; $a++ )
        $widget .="<option value=\"$a\">$a</option>\n";
    $widget .="</select><br>\n";
    return $widget;
}

function setWidgetValue2x( $skill  )
{
    $widget = "<p>".$skill[1]."</p><input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
    return $widget;
}

function setWidgetValue( $skill )
{
    $widget = "<p>".$skill[1]."</p><input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", this.value )\" >\n";
    return $widget;
}


function setAllWidgetValue( $skills  )
{
    $widget = "<div id='valSkills' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue2( $skill );
    $widget .= "</div>\n";
    return setWidgetValue2( $skills[0] );
    //return $widget;

}



session_start();
$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>bonjour $surname_user</h3>\n";


$req = "SELECT * FROM $DB_dbname.skills";
$result = executeSQL( $req );

$skills = [];
while( $data = $result->fetch_assoc())
{
    array_push( $skills, [ $data['id'], $data[ 'name']   ] );
}

//print_r( $skills );


?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<style>
.drum-viewport {
  position: relative;
  height: 8em;
  background: hsl(0, 0%, 90%);
  border: 5px solid hsl(0, 0%, 90%);
  cursor: pointer;
}

.drum-viewport:focus {
  outline: none;
  background: hsl(0, 0%, 85%);
  border-color: hsl(0, 0%, 85%);
}

.drum-viewport::before,
.drum-viewport::after {
  content: "";
  position: absolute;
  z-index: 1;
  left: 0;
  right: 0;
  height: 3em;
}

.drum-viewport::before {
  top: 0;
  background: linear-gradient(to bottom,
    hsla(0, 0%, 90%, 1),
    hsla(0, 0%, 90%, 0));
}

.drum-viewport::after {
  bottom: 0;
  background: linear-gradient(to bottom,
    hsla(0, 0%, 90%, 0),
    hsla(0, 0%, 90%, 1));
}

.drum-viewport:focus::before {
  background: linear-gradient(to bottom,
    hsla(0, 0%, 85%, 1),
    hsla(0, 0%, 85%, 0));
}

.drum-viewport:focus::after {
  background: linear-gradient(to bottom,
    hsla(0, 0%, 85%, 0),
    hsla(0, 0%, 85%, 1));
}

.drum-item {
  padding: 0.4em;
  background: white;
  color: hsl(210, 90%, 37%);
  text-align: center;
  font-weight: bold;
}

.drum-item:not(:last-child) {
  border-bottom: 1px solid hsl(30, 90%, 55%);
}
</style>

<script src="jquery.drum.min.js">
  
</script>



<script>
  $('.valSkillSelector').drum();
</script>

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