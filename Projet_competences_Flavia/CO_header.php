<?php


function setHeader($title="skills"){
    
    echo "<!DOCTYPE html>";
    echo "<html lang=\"fr\">";
    echo "<head>";
    echo "<meta charset=\"UTF-8\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=\1.0\">";
    echo  "<title>$title</title>";
    echo "<link rel=\"stylesheet\" href=\"style/style.css\">";
    echo "</head>";
}

function NavBar(){
echo "<div class=\"container\">";
        echo "<div class=\"navbar\">";
            echo "<nav>";
                echo "<ul>";
                   echo "<li><a href=\"\">Home</a></li>";
                    echo "<li><a href=\"CO_registration.php\">Register</a></li>";
                    echo "<li><a href=\"CO_login.php\">Login</a></li>";
                echo "</ul>";
           echo "</nav>";
        echo "</div>";
    }


    function NavBar2(){
        echo "<div class=\"container\">";
                echo "<div class=\"navbar\">";
                    echo "<nav>";
                        echo "<ul>";
                            echo "<li><a href=\"CO_home.php\">Home</a></li>";
                            echo "<li><a href=\"CO_AfficheUser.php\">Users</a></li>";
                            echo "<li><a href=\"CO_logout.php\">Logout</a></li>";    
                        echo "</ul>";
                   echo "</nav>";
                echo "</div>";
            }
        


?>