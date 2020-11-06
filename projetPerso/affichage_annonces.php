<?php
//$__TEST = true;


function afficher_vignette_annonce( $cible="")
{

    echo "        <form method=\"POST\" action=\"$cible\" class=\"form\">\n";
    echo "        <input type=\"submit\" class=\"button\" name=\"decouvrir\" value=\"Découvir\">\n";
    echo "        <input type=\"submit\" class=\"button\" name=\"avis\" value=\"Avis\">\n";
    echo "        <input type=\"submit\" name=\"like\" value=\"LIKE !\"/>";
    echo "    </form>\n";
    echo "    </div>\n";          
    echo "</div>\n";
}


/*function afficher_galerie( $vignettes, $cible )
{
// je prepare la DIV container
    echo "<div class=\"container_vignettes\">"; 
        // je parcours le  dictionnaire des annonces 
        
        foreach ( $vignettes as $numCard => $annonce ) 
        {
            echo $numCard;
            // je récupère les éléments du tableau
            $tit       = $annonce[1];
            $par       = $annonce[2];
            $prix      = $annonce[3];
            $like      = $annonce[4];
            $dislike   = $annonce[5];
            $vue       = $annonce[6];
            afficher_vignette_annonce( $tit, $par, $prix, $like, $dislike,$vue, "$cible?IDAnnonce=$numCard" );
        }
    echo "</div>\n";
}







if ( $__TEST )
{
     include ( "MA_fonctions_generales.php" );

     setHeaderNoCache();
   
    echo "<div class=\"container_vignettes\">";
        for( $i=0 ; $i < 20 ; $i++ )
            afficher_vignette_annonce( "mon annonce", "voici un beau lieu de détente", "https://cdn.laredoute.com/products/680by680/4/3/7/43716f4ce8f9a20d91ae2ac686ad3ef5.jpg", "" ); 

    echo "</div>";

}
*/
?>