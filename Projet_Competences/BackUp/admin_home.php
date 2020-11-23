<?php 
  session_start(); 

  if (!isset($_SESSION['surname']) || $_SESSION['type'] != 'admin') {
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
HEAD3("Admin_home");
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
	  
	  
	  <div id="addUser" class="">
				<div class="text-center">
					<h3>Ajouter un formateur</h3>
						<br>
					<FORM  method='POST' action="#">
					<INPUT type='text' id='for_mail' name='for_mail' placeholder="mail du formateur" onchange="inscritFormateur2Formation()">
						<br>
						<select id='for_mail_sel' name="selFormation" onchange="inscritFormateur2Formation()" >
						<?=$widget_formation?>
						</select>

						<br>
						<br>
						<br>
					<h3>Ajouter une session de formation</h3>
						<br>
					<INPUT type='text' name='session_name' id='session_name' placeholder="nom de la formation (10car min)" onchange="inscritSession()">
						<br>
						<select id='for_formation_sel' name="selFormation2" onchange="inscritSession()" >
						<?=$widget_formation?>
						</select>
						<br>
						date début : 
						<INPUT type='date' name='session_date_begin' id='session_date_b' onchange="inscritSession()">
						<br>
						date fin :
					<INPUT type='date' name='session_date_end' id='session_date_e' onchange="inscritSession()">


						<br>
						<br>
						<br>
					<h3>Inscrire un formateur à session</h3> 
						<br>
						<INPUT type='text' id='for_mail_f2s' name='for_mail' placeholder="mail du formateur" onchange="inscritFormateur2Session()">
						<br>
						<select id='session_sel_f2s' name="selSession" onchange="inscritFormateur2Session()">
						<?=$widget_session?>
						</select>
						<br>
						<INPUT type='submit' value='OK'>
						<br>
						<br>
						<br>
						<br>
					</FORM>


						<br>
						<br>
						<br>
						<h3>Ajouter des acteurs</h3>
						<br>
						<FORM  method='POST' action="inscriptActeursPOST.php">
						<textarea  name="list_stagiaire" id="list_stagiaire" rows="10" cols="50">
						</textarea>
						<br>
						<select id='type_sel' name="seltype">
						<option value=''>choisir type</option>
						<option value='STA'>stagiaire</option>
						<option value='FOR'>formateur</option>
						<option value='ADM'>administrateur</option>
						</select>
						<br>
						<INPUT type='submit' value='INSCRIPTION'>
						</FORM>
						<br>
						<br>
						<br>
						inscrire des acteurs à une session de formation
						<br>
						<FORM  method='POST' action="inscriptStagiaire2SessionPOST.php">
						<textarea  name="list_stagiaire" id="list_stagiaire" rows="10" cols="50">
						</textarea>
						<br>
						<select id='session_sel' name="selSession" >
						<?=$widget_session?>
						</select>
						<br>
						<INPUT type='submit' value='INSCRIPTION'>
						</FORM>




					<h3>Ajouter des stagiaires</h3>
					<FORM  method='POST' action="inscriptStagiaire.php">
					<br>
						<textarea  name="list_stagiaire" rows="10" cols="50">
						</textarea>
						<br>
						<br>
						<INPUT type='text' name='for_form_stagiaire' placeholder="formation">
						<br>
						<INPUT type='submit' value='OK'>
						<br>
						<br>
						<br>
						<br>
					</FORM>
					</div>
	   </div>
      </body>

      <!---- footer ---->
      <footer>
			<div class="footer text-center">
				<a href="#"><img src="images/footer-logo.png" title="daisy" /></a>
				<script type="text/javascript">
									$(document).ready(function() {
										
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										
										
										$().UItoTop({ easingType: 'easeOutCubic' });
										
									});
								</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
      <!---- footer ---->
      </footer>
			<link rel="stylesheet" href="AdminCss.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>


</html>


</html>