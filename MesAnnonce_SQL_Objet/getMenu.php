<?php

    $type = $_GET[ 'type' ];
    echo $type."<br>";

    if ($type == "general" )
    {
        echo "<input type=\"button\" value=\"ACCUEIL\" onclick=\"chargeMain('general');\">\n";
        echo "<input type=\"button\" value=\"INFO\" onclick=\"chargeMain('info');\">\n";
        echo "<input type=\"button\" value=\"CONTACT\" onclick=\"chargeMain('contact');\">\n";
    }

    if ($type == "info" )
    {
        echo "<input type=\"button\" value=\"NEWS\" onclick=\"chargeAnnonce('IMO');\">\n";
        echo "<input type=\"button\" value=\"LOCALE\" onclick=\"chargeAnnonce('CAR');\">\n";
        echo "<input type=\"button\" value=\"CONTACT\" onclick=\"chargeAnnonce('VOI');\">\n";
    }




?>