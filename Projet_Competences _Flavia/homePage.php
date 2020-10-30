<?php

include_once(  "CO_functions.php"  );
echo "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";


function setWidgetSkills( $skills  )
{
    $widget = "<select name='selSkill' >\n";
    foreach( $skills as $skill )
        $widget .= "<option value=\"".$skill[ 0 ]."\">".$skill[ 1 ]."</option>\n";  
    $widget .= "<select>\n";
    return $widget;
}

function setWidgetSkills2( $skills  )
{
    $widget = "<div id='selSkill' >\n";
    foreach( $skills as $skill )
        $widget .= "<button value=\"".$skill[ 0 ]."\">".$skill[ 1 ]."</button>\n";  
    $widget .= "</div>\n";
    return $widget;
}

function setWidgetSkills1( $skills  )
{
    $widget = "<div id='selSkill' >\n";
    foreach( $skills as $skill )
        $widget .= "<a href='".$_SERVER['PHP_SELF']."?idSkill=".$skill[ 0 ]."'>".$skill[ 1 ]."</a>\n";  
    $widget .= "</div>\n";
    return $widget;
}

function setWidgetValue2( )
{
    $widget = "<input id='number' type='number' value='0' name='valSkill' min='0' max='10'>\n";
    return $widget;
}



session_start();



$req = "SELECT * FROM flavia.skills";
$result = executeSQL( $req );

$skills = [];
while( $data = $result->fetch_assoc())
{
    array_push( $skills, [ $data['id'], $data[ 'langages']   ] );
}




//print_r( $skills );



/*if( $_POST && $_POST['selSkill'] != "" && $_POST['valSkill'] != "" ) 
{
    $selSkill       = $_POST['selSkill'];
    $valSkill       = $_POST['valSkill'];

    
    $req = "INSERT INTO flavia.results ( id_user, id_skill, result ) VALUES ( ".$ID_user.", ".$selSkill.", ".$valSkill." );";
    $result = executeSQL( $req );
    echo "<h3>skill à jour</h3>";
}
*/
?>
<h1>Vos competences</h1>
<FORM  method='POST' name="formSkill" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php echo setWidgetSkills( $skills  );
echo "<input id=\"number\" type=\"number\" value=\"0\" name=\"HTML\" min=\"0\" max=\"10\">\n";

?>
<br>

<br>
<INPUT type='submit' value='OK'>
</FORM>

