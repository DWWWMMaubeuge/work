<?php

function nav()
{
$str  = "<nav class=\"navbar navbar-expand-lg navbar-white bg-dark\">\n";
$str .= "<a class=\"navbar-brand\" href=\"#\"><img src=\"Images/Images_Charte_Graphique/logo_ozinor_propo_SIMPLE_v2.PNG\"width=\"50px;\"></a>\n";
$str .= "<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\n";
$str .= "<span class=\"navbar-toggler-icon\"></span>\n";
$str .= "</button>\n";
$str .= "<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">\n";
$str .= "<ul class=\"navbar-nav mr-auto\">\n";  
$str .= "<li class=\"nav-item active\">\n";
$str .= "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n";
$str .= "Nicolas\n";
$str .= "</a>\n";
$str .= "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">\n";
$str .= "<a class=\"dropdown-item\" href=\"accueil.php\">Accueil</a>\n";
$str .= "<div class=\"dropdown-divider\"></div>\n";
$str .= "<a class=\"dropdown-item\" href=\"#\">Loisir</a>\n";
$str .= "<div class=\"dropdown-divider\"></div>\n";
$str .= "<a class=\"dropdown-item\" href=\"#\">Jeux</a>\n";        
$str .= "</div>\n";
$str .= "</li>\n";
$str .= "<li class=\"nav-item\">\n";
$str .= "<a class=\"nav-link\" href=\"#\">New</a>\n";
$str .= "</li>\n";
$str .= "<li class=\"nav-item\">\n";
$str .= "<a class=\"nav-link\" href=\"#\">Formulaire</a>\n";
$str .= "</li>\n";
$str .= "<li class=\"nav-item\">\n";
$str .= "<a class=\"nav-link\" href=\"#\">CV</a>\n";
$str .= "</li>\n";    
$str .= "<li class=\"nav-item dropdown\">\n";
$str .= "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">\n";
$str .= "connexion\n";
$str .= "</a>\n";
$str .= "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">\n";
$str .= "<a class=\"dropdown-item\" href=\"inscription01.php\">enregistrer</a>\n";
$str .= "<div class=\"dropdown-divider\"></div>\n";
$str .= "<a class=\"dropdown-item\" href=\"#\">mon compte </a>\n";
$str .= "</div>\n";
$str .= "</li>\n";    
$str .= "</ul>\n";    
$str .= "<a href=\"#\" class=\"far fa-sign-in-alt\"></a>\n";
$str .= "<a href=\"#\" class=\"fa fa-user\"></a>\n";
   
$str .= "<a href=\"#\" class=\"fa fa-twitch\"></a>\n";
$str .= "<a href=\"#\" class=\"fa fa-twitter\"></a>\n";
$str .= "<a href=\"#\" class=\"fa fa-youtube\"></a>\n";

$str .= "</ul>\n";
$str .= "</div>\n";
$str .= "</div>\n";
$str .= "</nav>\n";
$str .= "<script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" integrity=\"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj\" crossorigin=\"anonymous\"></script>\n";
$str .= "<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>\n";
$str .= "<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js\" integrity=\"sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV\" crossorigin=\"anonymous\"></script>\n";


return $str;

}
?>