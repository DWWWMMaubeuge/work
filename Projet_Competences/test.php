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


<?php
include "Entete.php";
HEAD3("Page Test");
?>

<body>
		<div id="top" class="bg">
		<!----- start-header---->
			<div id="home" class="header">
					<div class="top-header">
						<div class="container">
						<div class="logo">
							<a href="#"><img src="images/logo.png" title="DWWM" /></a>
						</div>
						<!----start-top-nav---->
						 <nav class="top-nav">
							<ul class="top-nav">
								<li><a href="#about" class="scroll">Add user</a></li>
								<li><a href="#port" class="scroll">Update user</a></li>
								<li><a href="#wedo" class="scroll">Delete user</a></li>
								<li><a href="#team" class="scroll">team</a></li>
								<li><a href="#contact" class="scroll">Logout</a></li>
							</ul>
							<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
						</nav>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!----- //End-header---->
			<!---- header-info ---->
			<div class="header-info text-center">
				<div class="container">
					<h1><span> </span><label>Bien le bonjour</label> <?php echo $_SESSION['surname']; ?>!<span> </span></h1>
					<p>Admin Home.</p>
					<a class="down-arrow down-arrow-to scroll" href="#about"><span> </span></a>
					<label class="mouse-divice"> </label>
				</div>
			</div>
			</div>
			<div class="clearfix"> </div>

			<!---- footer ---->
			<div class="footer text-center">
				<a href="#"><img src="images/footer-logo.png" title="daisy" /></a>
				<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutCubic' });
										
									});
								</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
			<!---- footer ---->
			<link rel="stylesheet" href="css/swipebox.css">
			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>

</body>








</html>