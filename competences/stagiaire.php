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

/*function setWidgetValue2( $skill )
{
    $widget = "<p>".$skill[1]."</p>\n";
<<<<<<< HEAD
    $widget .= <input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", this.value )\" >";
=======
    $widget .= "<input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", this.value )\" >\n";
>>>>>>> main
    return $widget;
}*/



// reçoit le tableau des skills   
/*
        $skills = [       ID   name
                        [ 1, "HTML"],
                        [ 2, "CSS" ],
                        ...
                  ] */ 
// retourne une str qui contient le code HTML de tous les éléments de saisie des skills
function setAllWidgetsValue( $skills  )
{
    $widget = "<div id='valSkills' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue2y( $skill );
    $widget .= "</div>\n";
    return $widget;
}

// ****************************************************************************
// ****************************************************************************
// ****************************************************************************
// ****************************************************************************
// debut du programme
session_start();

// verifier que le visteurs est bien passé par le login
if ( !isset( $_SESSION[ 'ID_user' ]) || $_SESSION[ 'ID_user' ] == 0 )
    header( "location: login.php");


$ID_formation   = $_SESSION[ 'ID_formation' ];
$ID_user        = $_SESSION[ 'ID_user' ];
$name_user      = $_SESSION[ 'name' ];
$surname_user   = $_SESSION[ 'surname' ];

echo "<h3>bonjour $surname_user $name_user </h3>\n";


// je recupère le nom de la formation
$req = "SELECT * FROM $DB_dbname.formations where id=$ID_formation";
$result = executeSQL( $req );
$data = $result->fetch_assoc();
$Formation_name = $data[ 'name' ];

echo "<h3>formation : $Formation_name</h3>\n";



// je récupère les skills de la formation
$req = "SELECT * FROM $DB_dbname.skills where id_formation=$ID_formation";
$result = executeSQL( $req );

// déclaration d'un tableau vide pour stocker les skills
$skills = [];
while( $ligne = $result->fetch_assoc())
{
    array_push( $skills, [ $ligne['id'], $ligne[ 'name']   ] );
    /*
        $skills = [       ID   name
                        [ 1, "HTML"],
                        [ 2, "CSS" ],
                        ...
                  ] */ 
}
?>
<script>
    function MAJ_Value( id_skill, value  )
    {
      var xhttp = new XMLHttpRequest();
      // maj_value.php?idUser=4&idSkill=4&valSkill=5
      
      let url = "majValueSkillGET.php?idUser=<?php echo $ID_user; ?>&idSkill="+id_skill+"&valSkill="+value;
      xhttp.open("GET", url, true);
      xhttp.send();
    }   
</script>


<FORM  method='POST' name="formSkill" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php //echo setAllWidgetsValue( $skills ); ?>
</FORM>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
=======
<?php echo setAllWidgetsValue( $skills ); ?>
</FORM>

