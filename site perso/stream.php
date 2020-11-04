<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<?php
include "php/EnteteStream.php";
HEAD("Stream");
?>

<body >

<style>
        .container-fluid
        {
            width: 90%;    
        }
        body {
            padding:0;
        }
</style>

<nav>
<?php
include "php/NavB.php";
NAVB();
?>
</nav>

    <!-- container -->
    <div class="container-fluid " >

        <!-- row-->
        <div class="row p-3">

            <!-- column stream-->
            <div class="stream col-xs-12 col-sm-12 col-md-12 col-lg-10 bg-dark embed-responsive embed-responsive-16by9 ">
                <iframe 
                    src="https://player.twitch.tv/?channel=redlafougere&parent=localhost"
                    frameborder="0"
                    allowfullscreen="true"
                    scrolling="no">
                </iframe>
            </div>
            <!-- column stream-->

            <!-- column chat-->
            <div class="stream d-none d-xs-none d-sm-none d-md-none d-lg-block col-xs-12 col-sm-12 col-md-12 col-lg-2 bg-dark embed-responsive embed-responsive-16by9">
                <iframe
                    id="chat_embed"
                    src="https://www.twitch.tv/embed/redlafougere/chat?parent=localhost">
                </iframe>
            </div>
            <!-- column chat-->

        </div>
        <!-- row -->

    </div>
    <!-- container -->

  <!-- https://www.matthieu-jalbert.fr/integrer-une-chaine-twitch-a-wordpress/ -->


<boby>