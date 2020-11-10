<?php

function nav($connect)
{
    if ($connect){            
$str  =  <<<TRY
<nav class="navbar navbar-expand-lg navbar-white bg-secondary">
<a class="navbar-brand" href="#"><img src=""width="50px;"></a>
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
<a class="dropdown-item" href="#">Loisir</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Jeux</a>      
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="#">New</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Formulaire</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">CV</a>
</li>    
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Mon Compte
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="#">profile</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="logOut.php">déconnection</a>
</div>
</li>  
</ul> 

<a href="#" class="fa fa-user"></a>   
<a href="#" class="fa fa-twitter"></a>
<a href="https://www.youtube.com/channel/UC7UyFqncumbBrV0Oa063KnQ?view_as=subscriber" class="fa fa-youtube"></a>
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
<nav class="navbar navbar-expand-lg navbar-white bg-secondary">
<a class="navbar-brand" href="#"><img src="Images/Images_Charte_Graphique/logo_ozinor_propo_SIMPLE_v2.PNG"width="50px;"></a>
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
<a class="dropdown-item" href="#">Loisir</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">Jeux</a>      
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="#">New</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Formulaire</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">CV</a>
</li>    
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
connexion
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="inscription.php">inscription</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="login.php">mon compte </a>
</div>
</li>  
</ul> 
<a href="#" class="far fa-sign-in-alt"></a>
<a href="#" class="fa fa-user"></a>  
<a href="#" class="fa fa-twitch"></a>
<a href="#" class="fa fa-twitter"></a>
<a href="#" class="fa fa-youtube"></a>

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