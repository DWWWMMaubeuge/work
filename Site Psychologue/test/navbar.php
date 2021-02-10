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

function NavBar2()
{
    echo $str = <<<NAV

    <!-- ==============================================
    MAIN NAV
    =============================================== -->
<div id="main-nav2" class="navbar navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-nav">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>

            <!-- ======= LOGO ========-->
            <a class="navbar-brand" href="index.php"><img src="images/logos/logo.png" alt="Psychologue" />ODC Conseil</a>

        </div>

        <div id="site-nav" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="sr-only">
                    <a href="index.php" class="">Accueil</a>
                </li>
                <li>
                    <a href="index.php#votre-psy" class="">Psychologue</a>
                </li>
                <li>
                    <a href="index.php#psychologie" class="">Pour quoi ?</a>
                </li>
                <li>
                    <a href="index.php#patients" class="">Pour qui ?</a>
                </li>
                <li>
                    <a href="index.php#honoraires" class="">Consultations</a>
                </li>
                <li>
                    <a href="index.php#contact" class="">Contact</a>
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

function NavBar3()
{
    echo $str = <<<NAV

    <nav class="menu">
    <ul>
        <li class="firstLi sous_menu"><a href="psychologue-maubeuge.php">Psychologie </a>
            <ul class="dropdown">
                <li class="sousLi"><a href="aide-psychologique-maubeuge.php">À quoi sert un psychologue ? </a></li>
                <li class="sousLi"><a href="troubles-psychiques.php">Les troubles</a></li>
                <li class="sousLi"><a href="therapie-comportementale-cognitive.php">Les thérapies comportementales et cognitives </a></li>
                <li class="sousLi"><a href="consultation-psychologue-maubeuge.php">Pour qui ? </a></li>
            </ul>
        <li class="firstLi sous_menu darker"><a href="psychologue-travail-maubeuge.php">Le conseil en entreprise </a>
            <ul class="dropdown">
                <li class="sousLi"><a href="stress-au-travail.php">Le stress au travail </a></li>
                <li class="sousLi"><a href="burn-out-maubeuge.php">Le burn-out </a></li>
                <li class="sousLi"><a href="echanges-de-pratiques.php">Échanges de pratiques </a></li>
                <li class="sousLi"><a href="sensibilisation.php">Sensibilisation </a></li>
            </ul>
        <li class="firstLi"><a href="pleine-conscience.php">Pleine Conscience</a></li>
    </ul>
</nav>
NAV;
}
