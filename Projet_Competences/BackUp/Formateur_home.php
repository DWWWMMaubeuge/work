<?php 
  session_start(); 

  if (!isset($_SESSION['surname']) || $_SESSION['type'] != 'formateur') {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: PageLogin.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['surname']);
  	header("location: PageLogin.php");
  }
?>


<?php
require "FunctionWidget.php";
include "Entete.php";
HEAD3("Formateur Home");
?>

<body>
<?php
include "NavAdmin.php";
NavbAdmin();
?>

			<!---- header-info ---->
			<div class="header-info text-center">
				<div class="container">
					<h1><span> </span><label>Bien le bonjour</label> <?php echo $_SESSION['surname']; ?>!<span> </span></h1>
					<p>Admin Home.</p>
					<!--- <a class="down-arrow down-arrow-to scroll" href="#about"><span> </span></a> --->
					<label class="mouse-divice"> </label>
				</div>
			</div>
			</div>
      <div class="clearfix"> </div>



<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<h3>Ajouter une compétence</h3>
<br>
<INPUT type='text' name='skill' placeholder="nouvelle compétence">
<br>
<INPUT type='submit' value='OK'>
<br>
<br>
<INPUT type='button' value='VOIR COMPETENCE'>
</FORM>
<br><br>
<?=$list_stagiaires?>