<?php

// fonction header qui nécessite le titre des pages en tant que parametre
function myHeader($title) {

    echo "<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
            <link rel='stylesheet' href='../style/custom.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
            <script src='https://kit.fontawesome.com/747acc35b5.js' crossorigin='anonymous'></script>
            <title>AFPA-Formations / $title </title>
        </head>
        <body class='bg-dark text-white'>"
    ;

}

?>