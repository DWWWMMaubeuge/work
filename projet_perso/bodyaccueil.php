<?php
function accueilbody()
{ 


$str = <<<RTY

    <div class="container">
    <div class="row m-4">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><img src="img/test.jpg" width=100%; ><p class="text-center">Mon cv</p></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><img src="img/test.jpg"width=100%; ><p class="text-center">Forum</p></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><img src="img/test.jpg"width=100%; ><p>Loisir</p></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6"><img src="img/test.jpg"width=100%; ><p>autres</p></div>
    </div>
</div>
RTY;

return $str;
}



function carousel()
{

    $str   = "<div id=\"carouselExampleIndicators\" class=\"carousel slide\" data-ride=\"carousel\">";
    $str  .= "<ol class=\"carousel-indicators\">";
    $str  .= "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>";
    $str  .= "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"1\"></li>";
    $str  .= "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"2\"></li>";
    $str  .= "</ol>";
    $str  .= "<div class=\"carousel-inner\">";
    $str  .= "<div class=\"carousel-item active\">";
    $str  .= "<img class=\" d-block w-100 img-fluid\" src=\"img/test01.jpg\" alt=\"First slide\">";
    $str  .= "</div>";
    $str  .= "<div class=\"carousel-item\">";
    $str  .= "<img class=\"d-block w-100 img-fluid\" src=\"img/test02.jpg\"  alt=\"Second slide\">";
    $str  .= "</div>";
    $str  .= "<div class=\"carousel-item\">";
    $str  .= "<img class=\" d-block w-100 img-fluid\" src=\"img/test03.jpg\"  alt=\"Third slide\">";
    $str  .= "</div>";
    $str  .= "</div>";
    $str  .= "<a class=\"carousel-control-prev\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"prev\">";
    $str  .= "<span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>";
    $str  .= "<span class=\"sr-only\">Previous</span>";
    $str  .= "</a>";
    $str  .= "<a class=\"carousel-control-next\" href=\"#carouselExampleIndicators\" role=\"button\" data-slide=\"next\">";
    $str  .= "<span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>";
    $str  .= "<span class=\"sr-only\">Next</span>";
    $str  .= "</a>";
    $str  .= "</div>";

    return $str;

}






?>