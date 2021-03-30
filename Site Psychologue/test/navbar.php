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
            <a class="navbar-brand scrollto" href="index.php"><img src="images/logos/logo.png" alt="Psychologue"/></a>

        </div>

        <div id="site-nav" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="sr-only">
                    <a href="index.php" class="scrollto">Accueil</a>
                </li>
                <li>
                    <a href="Parcours.php">Votre psychologue</a>
                </li>
                <li>
                    <a href="#psychologie" class="scrollto">pour qui ?</a>
                </li>
                <li>
                    <a href="#patients" class="scrollto">Mes compétences</a>
                </li>
                <li>
                    <a href="#honoraires" class="scrollto">Consultations</a>
                </li>
                <li>
                    <a href="#contact" class="scrollto">Contact</a>
                </li>
                <li>
                    <a href="liens-utiles.php">Liens utiles</a>
                </li>
                <li>
                <a href="psychologue-maubeuge.php">Psychologie</a>
                </li>
                <li>
                    <a href="aide-psychologique-maubeuge.php">À quoi sert un psychologue ?</a>
                </li>
                <li>
                    <a href="troubles-psychiques.php">Les troubles</a>
                </li>
                <li>
                    <a href="therapie-comportementale-cognitive.php">Les thérapies comportementales et cognitives</a>
                </li>
                <li>
                    <a href="pleine-conscience.php">Pleine Conscience</a>
                </li>
                <li>
                    <a href="psychologue-travail-maubeuge.php">Le conseil en entreprise</a>
                </li>
                <li>
                    <a href="stress-au-travail.php">Le stress au travail</a>
                </li>
                <li>
                    <a href="burn-out-maubeuge.php">Le burn-out</a>
                </li>
                <li>
                    <a href="echanges-de-pratiques.php">Échanges de pratiques</a>
                </li>
                <li>
                    <a href="sensibilisation.php">Sensibilisation</a>
                </li>
                <!--<li>
                    <a href="Blog.php">Publications</a>
                </li>-->
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
            <a class="navbar-brand" href="index.php"><img src="images/logos/logo.png" alt="Psychologue" /></a>

        </div>

        <div id="site-nav" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="sr-only">
                    <a href="index.php" class="">Accueil</a>
                </li>
                <li>
                    <a href="Parcours.php">Votre psychologue</a>
                </li>
                <li>
                    <a href="index.php#psychologie" class="">pour qui ?</a>
                </li>
                <li>
                    <a href="index.php#patients" class="">Mes compétences</a>
                </li>
                <li>
                    <a href="index.php#honoraires" class="">Consultations</a>
                </li>
                <li>
                    <a href="index.php#contact" class="">Contact</a>
                </li>
                <li>
                    <a href="liens-utiles.php">Liens utiles</a>
                 </li>
                 <li>
                 <a href="psychologue-maubeuge.php">Psychologie</a>
                </li>
                <li>
                    <a href="aide-psychologique-maubeuge.php">À quoi sert un psychologue ?</a>
                </li>
                <li>
                    <a href="troubles-psychiques.php">Les troubles</a>
                </li>
                <li>
                    <a href="therapie-comportementale-cognitive.php">Les thérapies comportementales et cognitives</a>
                </li>
                <li>
                    <a href="pleine-conscience.php">Pleine Conscience</a>
                </li>
                <li>
                    <a href="psychologue-travail-maubeuge.php">Le conseil en entreprise</a>
                </li>
                <li>
                    <a href="stress-au-travail.php">Le stress au travail</a>
                </li>
                <li>
                    <a href="burn-out-maubeuge.php">Le burn-out</a>
                </li>
                <li>
                    <a href="echanges-de-pratiques.php">Échanges de pratiques</a>
                </li>
                <li>
                    <a href="sensibilisation.php">Sensibilisation</a>
                </li>
                <!--<li>
                    <a href="Blog.php">Publications</a>
                </li>-->
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

    <nav id="menu">
    <ul>
        <li class="firstLi sous_menu"><a href="psychologue-maubeuge.php">Psychologie </a>
            <ul class="dropdown">
                <li class="sousLi"><a href="aide-psychologique-maubeuge.php">À quoi sert un psychologue ? </a></li>
                <li class="sousLi"><a href="troubles-psychiques.php">Les troubles</a></li>
                <li class="sousLi"><a href="therapie-comportementale-cognitive.php">Les thérapies comportementales et cognitives </a></li>
                <!--<li class="sousLi"><a href="consultation-psychologue-maubeuge.php">Pour qui ? </a></li>-->
            </ul>
            <li class="firstLi"><a href="pleine-conscience.php">Pleine Conscience</a></li>
        <li class="firstLi sous_menu"><a href="psychologue-travail-maubeuge.php">Le conseil en entreprise </a>
            <ul class="dropdown">
                <li class="sousLi"><a href="stress-au-travail.php">Le stress au travail </a></li>
                <li class="sousLi"><a href="burn-out-maubeuge.php">Le burn-out </a></li>
                <li class="sousLi"><a href="echanges-de-pratiques.php">Échanges de pratiques </a></li>
                <li class="sousLi"><a href="sensibilisation.php">Sensibilisation </a></li>
            </ul>
    </ul>
</nav>
NAV;
}

function NavBar4()
{
    echo $str = <<<NAV

    <!-- ==============================================
    MAIN NAV
    =============================================== -->
<div id="main-nav4" class="navbar navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-nav">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>

            <!-- ======= LOGO ========-->
            <a class="navbar-brand scrollto" href="index.php"><img src="images/logos/logo.png" alt="Psychologue" /></a>

        </div>

        <div id="site-nav" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="sr-only">
                    <a href="index.php" class="scrollto">Accueil</a>
                </li>
                <li>
                    <a href="Parcours.php">Votre psychologue</a>
                </li>
                <li>
                    <a href="#psychologie" class="scrollto">pour qui ?</a>
                </li>
                <li>
                    <a href="#patients" class="scrollto">Mes compétences</a>
                </li>
                <li>
                    <a href="#honoraires" class="scrollto">Consultations</a>
                </li>
                <li>
                    <a href="#contact" class="scrollto">Contact</a>
                </li>
                <li>
                    <a href="liens-utiles.php">Liens utiles</a>
                </li>
                <li>
                <!--<li>
                    <a href="Blog.php">Publications</a>
                </li>-->
            </ul>
        </div>
        <!--End navbar-collapse -->

    </div>
    <!--End container -->

</div>
<!--End main-nav -->
NAV;
}

function NavBar5()
{
    echo $str = <<<NAV

    <!-- ==============================================
    MAIN NAV
    =============================================== -->
<div id="main-nav5" class="navbar navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-nav">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>

            <!-- ======= LOGO ========-->
            <a class="navbar-brand" href="index.php"><img src="images/logos/logo.png" alt="Psychologue" /></a>

        </div>

        <div id="site-nav" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="sr-only">
                    <a href="index.php" class="">Accueil</a>
                </li>
                <li>
                    <a href="Parcours.php">Votre psychologue</a>
                </li>
                <li>
                    <a href="index.php#psychologie" class="">pour qui ?</a>
                </li>
                <li>
                    <a href="index.php#patients" class="">Mes compétences</a>
                </li>
                <li>
                    <a href="index.php#honoraires" class="">Consultations</a>
                </li>
                <li>
                    <a href="index.php#contact" class="">Contact</a>
                </li>
                <li>
                    <a href="liens-utiles.php">Liens utiles</a>
                 </li>
                <!--<li>
                    <a href="Blog.php">Publications</a>
                </li>-->
            </ul>
        </div>
        <!--End navbar-collapse -->

    </div>
    <!--End container -->

</div>
<!--End main-nav -->
NAV;
}
