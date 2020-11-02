<?php
   function HEAD($title)
   {
    echo "<!DOCTYPE html>\n";
    echo "<html lang='fr' dir=\"ltr\">\n";
    echo "<head>";
    echo "<meta charset='UTF-8'>\n";
    echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css\" crossorigin=\"anonymous\">\n";
    echo "<link href='http://fonts.googleapis.com/css?family=Racing+Sans+One' rel='stylesheet' type='text/css'>\n";
    echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\n";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
    echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>\n";
    echo"<script src=\"https://kit.fontawesome.com/a076d05399.js\"></script>\n";
    echo "<script src=\"js/slick.min.js\"></script>\n";
    echo "<title>$title</title>\n";
    echo "<script src=\"https://code.jquery.com/jquery-3.5.1.slim.min.js\" integrity=\"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj\" crossorigin=\"anonymous\"></script>\n";
    echo "<script src=\"https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js\" integrity=\"sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN\" crossorigin=\"anonymous\"></script>\n";
    echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js\" integrity=\"sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q\" crossorigin=\"anonymous\"></script>\n";
    echo "<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js\" integrity=\"sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl\" crossorigin=\"anonymous\"></script>\n";
    echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\" integrity=\"sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z\" crossorigin=\"anonymous\">\n";
    echo "<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js\" integrity=\"sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV\" crossorigin=\"anonymous\"></script>\n";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/css2.css\">\n";
    echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"css/css1.css\">\n";
    echo "</head>\n";

   };



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