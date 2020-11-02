<?php
function accueilbody()
{ 


$str = <<<RTY

    <div class="container">
    <div class="row m-4">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><img src="img/cv.jpg" width=100%; ><p class="text-center">Mon cv</p></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><img src="img/contact2.jpg"width=100%; ><p class="text-center">Forum</p></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><img src="img/cv.jpg"width=100%; ><p>Loisir</p></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><img src="img/cv.jpg"width=100%; ><p>autres</p></div>
    </div>
</div>
RTY;

return $str;
}



function carousel()
{

    $str   = <<< RTY
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
    <div class="carousel-item active">
    <img class=" d-block w-100 img-fluid" src="img/test01.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
    <img class="d-block w-100 img-fluid" src="img/test02.jpg"  alt="Second slide">
    </div>
    <div class="carousel-item">
    <img class=" d-block w-100 img-fluid" src="img/test03.jpg"  alt="Third slide">
    </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
    </div>
    RTY;
    return $str;
    }






?>