<?php
include "Entete.php";
HEAD("Page compétences");
include_once(  "Connect.php"  );
require "FunctionWidget.php"
?>

<script>

function MAJValue( id_skill, value  )
{

  var xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
    {
     	document.getElementById("message_validation").innerHTML = "valeur enregistrée";
    }
  };

  xhttp.open("GET", "maj_value.php?id_skill="+id_skill+"&value="+value, true);
  xhttp.send();
}	

</script>	

<?php
session_start();

$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>Welcome $surname_user</h3>\n";


$req = "SELECT * FROM $DB_dbname.skills";
$result = executeSQL( $req );

$skills = [];
while( $data = $result->fetch_assoc())
{
    array_push( $skills, [ $data['id'], $data[ 'skill']   ] );
}
?>

<FORM  method='POST' name="formSkill" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php 
echo "<div class='skills'>";
echo setAllWidgetValue( $skills );
echo "</div>";
 ?>
</FORM>