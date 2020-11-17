<?php 
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
?>

<body>

<?php
include "Entete.php";
HEAD("Page compétences");
require "FunctionWidget.php";
include "Connect.php";
include "NavAdmin.php";
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

function MAJValue( id_skill, value  )
{

  var xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
    {
     	document.getElementById("message_validation").innerHTML = "valeur enregistrée";
    }
  };

  xhttp.open("GET", "majValue.php?id_skill="+id_skill+"&value="+value, true);
  xhttp.send();
}	

</script>	

<?php
/*session_start();

$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>Welcome $surname_user</h3>\n";*/


$req = "SELECT * FROM skills";
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