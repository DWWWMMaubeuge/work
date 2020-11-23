<?php 
include "Entete.php";
require "FunctionWidget.php";
include "Connect.php";
include "NavAdmin.php";

  session_start(); 

  if (!isset($_SESSION['surname'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: PageLogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['surname']);
  	header("location: PageLogin.php");
  }

  $ID_formation   = $_SESSION[ 'id_formation' ];
  $ID_user = $_SESSION[ 'id' ];
  $name_user = $_SESSION[ 'name' ];
  $surname_user = $_SESSION[ 'surname' ];
?>

<body>

<?php
HEAD("Page compétences");
Navb()
?>

 			<div class="header-info text-center">
				<div class="container">
					<h1><span> </span><label>Vos niveaux de maîtrise</label> <?php echo $_SESSION['surname']; ?>!<span> </span></h1>
					<p>Admin Home.</p>
					<a class="down-arrow down-arrow-to scroll" href="#about"><span> </span></a>
					<label class="mouse-divice"> </label>
				</div>
			</div>
			</div>
      <div class="clearfix"> </div>



<script>

function MAJ_Value( id_skill, value  )
    {
      var xhttp = new XMLHttpRequest();
      // maj_value.php?idUser=4&idSkill=4&valSkill=5
      
      let url = "maj_value.php?idUser=<?php echo $ID_user; ?>&idSkill="+id_skill+"&valSkill="+value;
      xhttp.open("GET", url, true);
      xhttp.send();
    } 

</script>	

<?php





$req = "SELECT * FROM $DB_dbname.formations where id=$ID_formation";
$result = executeSQL( $req );
$data = $result->fetch_assoc();
$Formation_name = $data[ 'name' ];

echo "<h3>formation : $Formation_name</h3>\n";

$req = "SELECT * FROM $DB_dbname.skills where id_formation=$ID_formation";
$result = executeSQL( $req );

$skills = [];
while( $data = $result->fetch_assoc())
{
    array_push( $skills, [ $data['id'], $data[ 'name'] ] );
}
//var_dump($skills);
?>

<FORM  method='POST' name="formSkill" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php 
echo "<div class='container'>";
echo setAllWidgetValue( $skills );
echo "</div>";
 ?>
</FORM>

</body>
<footer>
<div class="footer text-center">
				<a href="#"><img src="images/footer-logo.png" title="daisy" /></a>
      </div>
</footer>
</html>