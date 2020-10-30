<?php
    $espece = $_GET[ "espece" ];

    if ( $espece == "chien" )
    {
        echo "<option value=\"bouledog\">bouledog</option>\n";
        echo "<option value=\"caniche\">caniche</option>\n";
    }

    if ( $espece == "chat" )
    {
        echo "<option value=\"siamois\">siamois</option>\n";
        echo "<option value=\"gouttiere\">gouttiere</option>\n";
    }


?>

