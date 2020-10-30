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
include "php/php1.php";
HEAD("Page d'accueil");
?>

<body >

<?php
NAVB();
?>

<Header>
        <!--<div class="banner-area">
            <div class="single-banner">
                <div classe="banner-img">
                    <img src="images/morgana1.png" alt="">
                </div>
                <div class="banner-text">
                    <li><a href="lol.php"><h2>League of Legends</h2></a></li>
                    <p>Tips et astuces toujours utile sur League of Legends!</p>
                </div>
            </div> 
            <div class="single-banner">
                <div classe="banner-img">
                    <img src="images/jurassicpark.png" alt="">
                </div>
                <div class="banner-text">
                    <li><a href="jura.php"><h2>Jurassic Park</h2></a></li>
                    <p>Tout savoir sur l'univers "dinosauresque" de Jurassic park!</p>
                </div>
            </div> 
            <div class="single-banner">
                <div classe="banner-img">
                    <img src="images/Elliot.png" alt="">
                </div>
                <div class="banner-text">
                    <li><a href="dessin.php"><h2>Dessin</h2></a></li>
                    <p>Mes p'tits dessins parce que pourquoi pas...</p>
                </div>
            </div>
        </div> --> 

<!-- CONTAINER -->
<div class="container-fluid rmp p-0">
    <!-- ROW -->
    <div class="row no-gutters">
    <!-- COL -->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="center-auto img-fluid" src="images/morgana1.png" alt="...">
                <div class="banner-text">
                <li><a href="stream.php"><h2>Stream</h2></a></li>
                    <p>Si je suis en stream venez passer faire un coucou dans le chat! *wink*</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="center-auto img-fluid" src="images/jurassicpark.png" alt="...">
                <div class="banner-text">
                <li><a href="jura.php"><h2>Jurassic Park</h2></a></li>
                    <p>Tout savoir sur l'univers "dinosauresque" de Jurassic park!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="center-auto img-fluid" src="images/Elliot.png" alt="...">
                <div class="banner-text">
                <li><a href="dessin.php"><h2>Dessin</h2></a></li>
                    <p>Mes p'tits dessins parce que pourquoi pas...</p>
                </div>
            </div>
        </div>
        </div>

    </div>
    <!-- COL -->
    </div>
    <!-- ROW -->
</div>
<!-- CONTAINER -->


        

</header>

   <!-- <script>

        $('.banner-area').slick({
            autoplay: true,
            speed: 800,
            arrows: false,
            dots: true,
            fade: true
        });

    </script>

    -->


		

    <footer>

    </footer>

</body>
</html>

<!--https://www.youtube.com/watch?v=uz7jiJTOHEs-->
