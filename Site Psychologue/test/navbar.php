<?php

function NavBar()
{
    echo $str = <<<NAV

    <!-- ==============================================
    MAIN NAV
    =============================================== -->
<div id="main-nav" class="navbar navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-nav">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>

            <!-- ======= LOGO ========-->
            <a class="navbar-brand scrollto" href="index.php"><img src="images/logos/logo.png" alt="Psychologue" />ODC Conseil</a>

        </div>

        <div id="site-nav" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="sr-only">
                    <a href="index.php" class="scrollto">Accueil</a>
                </li>
                <li>
                    <a href="#votre-psy" class="scrollto">Psychologue</a>
                </li>
                <li>
                    <a href="#psychologie" class="scrollto">Pour quoi ?</a>
                </li>
                <li>
                    <a href="#patients" class="scrollto">Pour qui ?</a>
                </li>
                <li>
                    <a href="#honoraires" class="scrollto">Consultations</a>
                </li>
                <li>
                    <a href="#contact" class="scrollto">Contact</a>
                </li>
                <li>
                    <a href="blog.php">Publications</a>
                </li>
            </ul>
        </div>
        <!--End navbar-collapse -->

    </div>
    <!--End container -->

</div>
<!--End main-nav -->
NAV;
}
