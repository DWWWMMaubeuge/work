<?php

function Entete($titre)
{
    echo $str = <<<ENT
    
    <!DOCTYPE html>
    <html lang="fr-FR" class="no-js">
        <head>
            <!-- ==============================================
            Title and Meta Tags
            =============================================== -->
            <meta charset="utf-8">
            <title>$titre</title>
            <meta name="description" content="Veronica Olivieri-Daniel, Psychologue à Paris 16. Spécialisée dans la prise en charge des enfants, adolescents ainsi que la thérapie de l'adulte et du couple.">		
            <meta name="Keywords" CONTENT="Psychologue Paris 16">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta property="og:title" content="Psychologue Paris 16 I Veronica Olivieri-Daniel" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="http://www..com" />
            <meta property="og:image" content="" />
            
            <!-- ==============================================
            Favicons
            =============================================== -->
            <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
            <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
            
            <!-- ==============================================
            CSS
            =============================================== -->    
            <!--<link rel="stylesheet" href="css/bootstrap.min.css"> -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            <link rel="stylesheet" href="css/font-awesome.min.css">
            <link rel="stylesheet" href="css/Flexslider.css">
                    <link rel="stylesheet" href="css/Styles.css">
            <link rel="shortcut icon" href="images/logos/logo_8.png">
            
            <!-- ==============================================
            Fonts
            =============================================== -->
            <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,200,500,600,700' rel='stylesheet' type='text/css'>
            <!-- ==============================================
            JS
            =============================================== -->
                
            <!--[if lt IE 9]>
                <script src="js/libs/respond.min.js"></script>
            <![endif]-->
            
            <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
            
            <link href="https://plus.google.com/118416677873362998638" rel="publisher" />		
            
        </head>
    ENT;
}
