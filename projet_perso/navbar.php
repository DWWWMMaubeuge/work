<?php

function nav($connect)
{
    if ($connect){            
$str  =  <<<TRY
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">  
<li class="nav-item active">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Nicolas
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="accueil.php">Accueil</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">A propos</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="https://cauliernicolas.000webhostapp.com/jeux.php"target="_blank">Jeux</a>      
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="accueil.php">New</a>
</li>
<li class="nav-item">
<a class="nav-link" href="https://cauliernicolas.000webhostapp.com/"target="_blank">réalisation</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">CV</a>
</li>    
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Mon Compte
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="profile.php">Mon profile</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="logOut.php"> se déconnecter</a>
</div>
</li>  
</ul> 

<a href="#" class="fa fa-user"></a>   
<a href="#" class="fa fa-twitter"></a>
<a href="https://www.twitch.tv/steelux2610"target="_blank" class="fa fa-twitch"></a>
<a href="https://www.youtube.com/channel/UC7UyFqncumbBrV0Oa063KnQ?view_as=subscriber"target="_blank" class="fa fa-youtube"></a>
<a href="logOut.php" class="fa fa-sign-out"></a>

</ul>
</div>
</div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

TRY;
return $str;
}

    
$str  =  <<<TRY
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">  
<li class="nav-item active">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Nicolas
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="accueil.php">Accueil</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">A propos</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="https://cauliernicolas.000webhostapp.com/jeux.php"target="_blank">Jeux</a>      
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="accueil.php">Accueil</a>
</li>
<li class="nav-item">
<a class="nav-link" href="https://cauliernicolas.000webhostapp.com/"target="_blank">realisation</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">CV</a>
<!-- href="http://www.alsacreations.com/astuce/lire/1603-html5-attribut-download.html"
   download="Article_HTML5_download.txt">Télécharger l'article en TXT</a> -->
</li>    
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
connexion
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="inscription.php">inscription</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="login.php"> s'enregistrer </a>
</div>
</li>  
</ul> 
<a href="#" class="far fa-sign-in-alt"></a>
<a href="#" class="fa fa-user"></a>  
<a href="https://www.twitch.tv/steelux2610"target="_blank" class="fa fa-twitch"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="https://www.youtube.com/channel/UC7UyFqncumbBrV0Oa063KnQ?view_as=subscriber"target="_blank" class="fa fa-youtube"></a>

</ul>
</div>
</div>
</nav>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

TRY;
return $str;

}
?>