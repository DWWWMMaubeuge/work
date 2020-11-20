<?php
function entete()
{
        echo "<!DOCTYPE html>\n";
        echo "<html>\n";
        echo "<head>\n";
        echo "<title>Compétences</title>\n";
        echo "<link rel=\"stylesheet\" href=\"style.css\">\n";
        echo "<meta charset=\"utf-8\">\n";
        echo "<meta name=\"author\" content=\"Flavia\">\n";
        echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
        echo "</head>\n";
        echo "<body>\n";
        echo "<div id=\"slideout-menu\">;\n";
        echo "<ul>\n";
        echo "<li>\n";
        echo "<a href=\"inscription01.php\">S'inscrire</a>\n";
        echo "</li>\n";
        echo "<li>\n";
        echo "<a href=\"login01.php\">Connexion</a>\n";
        echo "</li>\n";
        echo "</ul>\n";
        echo "</div>\n";
                
}

function logo()
{                 
    echo "<nav>\n";
    echo "<div id=\"logo-img\">\n";
    echo "<a href=\"homePage.php\">\n";
    echo "<img class=\"img-fluid\" src=\"afpa.png\"  style=\"height: 100px\">\n";
    echo "</a>\n";
    echo"<div id=\"menu-icon\">\n";
    echo "<i class=\"fas fa-bars\">n";
    echo "</i>\n";
    echo "</div>\n";
    echo "<ul>\n";
    echo "<li>\n";

}

    function nav( $numActif )
    {
                if ( $numActif == 0 )
                    echo "<a href=\"inscription01.php\" class=\"active\">S'inscrire</a>\n";
                else
                    echo "<a href=\"inscription01.php\" >S'inscrire</a>\n";

                if ( $numActif == 1 )
                    echo "<a href=\"login01.php\" class=\"active\">Connexion</a>\n";
                else
                    echo "<a href=\"login01.php\">Connexion</a>\n";

    echo "</li>\n";
    echo"</nav>\n";
}




function footer()
{

    echo "<footer class=\"footer\">\n";
    echo "<a href=\"homePage.php\">\n";
    echo "<img class=\"img-fluid\" src=\"afpa.png\"  style=\"height: 100px\">\n";
    echo "</a>\n";
    echo "<div class=\"text_footer \">\n";
    echo "© 2020 Compétences Fortunato Flavia\n";
    echo "</div>\n";
    echo "</footer>\n";


}
?>