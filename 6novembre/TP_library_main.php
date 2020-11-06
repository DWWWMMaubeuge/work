<?php


function head( $title  )
{
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01//EN\">\n";
    echo "<html>\n";
    echo "<head>\n";
    echo "  <title>$title</title>\n";
    echo "  <link href=\"mon.css\" rel=\"stylesheet\">\n";
    echo "</head>\n";
    echo "<body>\n";
}


function menu( )
{
    echo "<ul class=\"navbar\">\n";
    echo "  <li><a class=\"active\" href=\"acceuil.php\">Home page</a></li>\n";
    echo "  <li><a href=\"reflexions.php\">Réflexions</a></li>\n";
    echo "  <li><a href=\"MaVille.php\">Ma ville</a></li>\n";
    echo "  <li><a href=\"visite.php\">Visites</a></li>\n";
    echo "  <li><a href=\"liens.php\">Liens</a></li>\n";
    echo "</ul>\n";
}







function footer(   )
{
    echo "<p>tel : 06 66 66 66 66</p>\n";
    echo "</body>\n";
    echo "</html>\n";
}


function myLink( $url, $label )
{

    echo "<div class=\"divLien\">\n";
        echo "<a href=\"$url\">$label</a>\n";
    echo "</div>\n";
}


function title1( $tit )
{
    echo "<h1>$tit</h1>\n";
}


         
function affTableauFormatHTML(  $tab  )
{
    echo '<table style="width:150px; border:3px solid purple;" >'; 
    foreach ($tab as $ligne )
    { 
        echo "<tr>\n";
            foreach ($ligne as $cellule ) 
               echo "<td>$cellule</td>\n";     
        echo "</tr>\n";
    }     

    echo "</table>\n";
}




?>


