<?php


function footer()
{
$str  = "<footer class=\"footer\">\n";
    //<!-- Footer Links -->
$str .= "<div class=\"container\" >\n";
    //<!-- Grid row -->
$str .= "<div class=\"row\">\n";
    //<!-- Grid column -->
$str .= "<div class=\"col-md-3 mt-md-0 mt-3\">\n";
     //<!-- Content -->
$str .= "<a href=\"#\">\n";
 $str .= "<img class=\"img-fluid\" src=\"./Images/Images_Charte_Graphique/logo_ozinor_propo_SIMPLE_v2.png\"  style=\"height: 200px\">\n";
$str .= "</a>\n";
$str .= "</div>\n";
    //<!-- Grid column -->
$str .= "<hr class=\"clearfix w-100 d-md-none pb-3\">\n";
    //<!-- Grid column -->
$str .= "<div class=\"col-md-3 mb-md-0 mb-3\">\n";
    //<!-- Links -->
$str .= "<h4 class=\"footer__title\">Socials</h4>\n";
$str .= "<ul class=\"list-unstyled\">\n";

$str .= "<li>\n";
$str .= "<a href=\"#!\">Facebook</a>\n";
$str .= "</li>\n";
$str .= "<li>\n";
$str .= "<a href=\"#!\">Twitter</a>\n";
$str .= "</li>\n";
$str .= "<li>\n";
$str .= "<a href=\"#!\">TikTok</a>\n";
$str .= "</li>\n";
$str .= "</ul>\n";
$str .= "</div>\n";
    //<!-- Grid column -->
    //<!-- Grid column -->
$str .= "<div class=\"col-md-3 mb-md-0 mb-3\">\n";
    //<!-- Links -->
$str .= "<h4 class=\"footer__title\">Structure</h4>\n";
$str .= "<ul class=\"list-unstyled\">\n";
$str .= "<li>\n";
$str .= "<a href=\"#!\">New</a>\n";
$str .= "</li>\n";
$str .= "<li>\n";
$str .= "<a href=\"#!\">Staff</a>\n";
$str .= "</li>\n";
$str .= "<li>\n";
$str .= "<a href=\"#!\">Shop</a>\n";
$str .= "</li>\n";
$str .= "<li>\n";
$str .= "<a href=\"#!\">About us</a>\n";
$str .= "</li>\n";
$str .= "</ul>\n";
$str .= "</div>\n";
    //<!-- Grid column -->
    //<!-- Grid column -->
$str .= "<div class=\"col-md-3 mb-md-0 mb-3\">\n";
    //<!-- Links -->
$str .= "<h4 class=\"footer__title\">Plus</h4>\n";
$str .= "<ul class=\"list-unstyled\">\n";
$str .= "<li>\n";
$str .= "<a href=\"#!\">Mentions légales</a>\n";
$str .= "</li>\n";
$str .= "<li>\n";
 $str .= "<a href=\"#!\">Contact</a>\n";
$str .= "</li>\n";
$str .= "</ul>\n";
$str .= "</div>\n";
    ////<!-- Grid column -->
$str .= "</div>\n";
    //<!-- Grid row -->
$str .= "<div class=\"separator\"></div>\n";
$str .= "</div>\n";
    //<!-- Footer Links -->
    //<!-- Copyright -->
$str .= "<div class=\"text_footer \">\n";
 $str .= "© 2020 Nicolas Caulier tous droits réservés\n";
$str .= "</div>\n";
    //<!-- Copyright -->
$str .= "</footer>\n";



return $str;



}
?>