<?php
$__TEST = false;

include ( "saisie_annonces.php" );
include ( "affichage_annonces.php" );
include ( "fonctions_generales.php" );

setHeaderNoCache();
gestionSession();
//afficher_vignette_annonce( $cible="PagePrincipale.php");



  $vignettes =
  [ 
    0 => [ "Ayatollah Sophia", "Lorem ipsum dolor sit amet, consectetur adipisicing elit" ],
    1 => [ "Japan street", "Lorem ipsum dolor sit amet, consectetur adipisicing elit" ],
    2 => [ "Maroccan Desert", "Lorem ipsum dolor sit amet, consectetur adipisicing elit" ],
    3 => [ "Peaceful mountain", "Lorem ipsum dolor sit amet, consectetur adipisicing elit" ],
];

?>
        


    <div class="container">
        <div class="navbar">
            <img src="img/square.png" class="logo" alt="Feel better">
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Workshop</a></li>
                    <li><a href="">About Us</a></li>
                    <li><a href="">Contact Us</a></li>
                    <input type="text" placeholder="Search..">
                </ul>
            </nav>
            <img src="img/menu.png" class="menuIcon">
        </div>

        
        <div class="row">
            <div class="col">
                <h1>Let's travel</h1> 
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Aliquam facilis quasi provident autem, sunt aperiam, vitae atque, consequuntur totam reiciendis quidem eaque sequi labore. 
                Provident iusto eos iste tenetur sunt.</p>
                <button type="button">Explore</button>
            </div>

            <?php 
            affichageAnnonce(0); 
            affichageAnnonce(1);
            affichageAnnonce(2);
            affichageAnnonce(3);
          
          
          ?>


            <!-- <div class="col">
                <div class="card card2">
                <h5>Japan street</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>          
                </div>
            </div>



            <div class="col">
                <div class="card card3">
                <h5>Maroccan Desert</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>          
                </div>
            </div>


            <div class="col">
                <div class="card card4">
                <h5>Peaceful mountain</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>            
                </div>
            </div> -->
        </div> 
    </div>
    <footer>This website is created by GTCoding</footer>     
</body> 
</html>
