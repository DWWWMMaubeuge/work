<?php
include "php/php1.php";
HEAD("Page d'accueil");
?>

  

<body>

<?php
NAVB();
?>


  <main style="margin-top: 0px">

    <!-- CONTAINER -->
    <div class="container-fluid rmp p-0">

      <!-- ROW -->
      <div class="row no-gutters">

        <!-- COL -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="center-auto img-fluid" src="images/akalikda2.png" alt="...">
                <div class="banner-text">
                  <h2> Whala plus petit que trois </h2>
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


    <div class="block_player">

      <!-- CONTAINER -->
        <div class="container">

            <!-- ROW -->
            <div class="row justify-content-center">

                <!-- COL -->
                <div class="col-9 col-sm-6 col-md-4 col-lg-3">

                    <!-- CARD -->
                    <div class="card__player">
                        <div class="info_name">
                            <h4 class="player__username">
                                Alex Kolakowski
                            </h4>
                            <h4 class="player__name">
                                Red La Fougère
                            </h4>
                            <h4 class="player__age">
                                23 ans
                            </h4>
                            <h4 class="player__title">
                                Developpeur Web
                            </h4>
                        </div>
                        <div class="slide-photo visible-xs">
                            <img class="player__image img-fluid" src="https://i.pinimg.com/originals/ae/22/3e/ae223ee1d2ece689df2b3444f07ffdd8.jpg" alt="">
                        </div>
                        <div class="info_player_social">
                            <div>
                                <a class="fab-icon__a" target="_blank" href="#">
                                    <i class="fab_profile fab fa-instagram"></i>
                                </a>
                                <a class="fab-icon__a" target="_blank" href="#">
                                    <i class="fab_profile fab fa-twitter"></i>
                                </a>
                                <a class="fab-icon__a" target="_blank" href="#">
                                    <i class="fab_profile fab fa-youtube"></i>
                                </a>
                                <a class="fab-icon__a" target="_blank" href="#">
                                    <i class="fab_profile fab fa-twitch"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- CARD -->

                </div>
                <!-- COL -->

            </div>
            <!-- ROW -->

        </div>
        <!-- CONTAINER -->
    </div>




  </main>


</body>
</html>