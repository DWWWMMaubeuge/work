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
HEAD3("Page Test");
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
						<INPUT type='text' id='for_mail' name='for_mail' placeholder="mail du formateur" onchange="inscritFormateur()">
						<br>
						<select id='for_mail_sel' name="selFormation" onchange="inscritFormateur()" >
						<?=$widget_formation?>
						</select>
						<br>
						<INPUT type='submit' value='OK'>
						<br>
						<br>
						<br>
						<br>
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