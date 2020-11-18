<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );


//https://www.jqueryscript.net/other/slot-machine-picker-drum.html
//https://www.jqueryscript.net/tags.php?/select/



function setWidgetValue2z( $skill  )
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

function setWidgetValue2( $skill )
{
    $widget = "<p>".$skill[1]."</p><input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", this.value )\" >\n";
    return $widget;
}


function setAllWidgetValue( $skills  )
{
    $widget = "<div id='valSkills' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue2y( $skill );
    $widget .= "</div>\n";
    //return setWidgetValue2( $skills[0] );
    return $widget;

}



session_start();
$ID_formation   = $_SESSION[ 'id_formation' ];
$ID_user        = $_SESSION[ 'ID_user' ];
$name_user      = $_SESSION[ 'name' ];
$surname_user   = $_SESSION[ 'surname' ];

echo "<h3>bonjour $surname_user</h3>\n";

$req = "SELECT * FROM $DB_dbname.formations where id=$ID_formation";
$result = executeSQL( $req );
$data = $result->fetch_assoc();
$Formation_name = $data[ 'name'];

echo "<h3>formation : $Formation_name</h3>\n";




$req = "SELECT * FROM $DB_dbname.skills where id_formation=$ID_formation";
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
hello world 2345
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>