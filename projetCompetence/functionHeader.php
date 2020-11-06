<?php


function setHearder(){
    
    echo "<!DOCTYPE html>";
    echo "<html lang=\"fr\">";
    echo "<head>";
    echo "<meta charset=\"UTF-8\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=\1.0\">";
    echo  "<title>Register Form</title>";
    echo "<link rel=\"stylesheet\" href=\"style.css\">";
    echo "</head>";
}

function NavBar(){
echo "<div class=\"container\">";
        echo "<div class=\"navbar\">";
            echo "<nav>";
                echo "<ul>";
                   echo "<li><a href=\"\">Home</a></li>";
                    echo "<li><a href=\"\">Register</a></li>";
                    echo "<li><a href=\"\">LogIn</a></li>";
                echo "</ul>";
           echo "</nav>";
        echo "</div>";
    }

?>