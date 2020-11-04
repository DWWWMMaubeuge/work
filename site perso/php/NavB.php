<?php

function NAVB()
   {
    echo "<nav>\n";
    echo "<input type=\"checkbox\" id=\"check\">\n
    <label for=\"check\" class=\"checkbtn\">\n
      <i class=\"fas fa-bars\"></i></label>\n";
        echo "<div class=\"logo\">\n";
            echo "Red La Fougère\n";
        echo "</div>\n";
        
            echo "<ul>\n";
                echo "<li><a class=\"active\" href=\"accueil.php\">Home</a></li>\n";
                echo "<li><a href=\"About_me.php\">About me</a></li>\n";
                echo "<li><a href=\"contact.php\">Contact</a></li>\n";
                echo "<li><a href=\"accueil.php?logout=\"1\"\" >logout</a></li>\n";
            echo "</ul>\n";
        
    echo "</nav>\n";

   };

?>