<?php

    $type = $_GET[ 'type' ];


    if ( $type == "general" )
    {
        echo "<p>bla bla bla Emmanuel Macron s'exprimera à la télévision mercredi 14 octobre pour parler de la recrudescence de la pandémie de Covid-19 et de ses conséquences économiques et sociales. Le président de la République prendra la parole en direct de l'Elysée à partir de 19h55. Il répondra aux questions d'Anne-Sophie Lapix (France 2) et de Gilles Bouleau (TF1). Cet entretien sera diffusé en direct sur France 2, TF1, franceinfo, LCI, et TV5 Monde.</p>\n";
    }

    if ( $type == "info" )
    {
        echo "<p> VOICI DE BELS INFOS .....Depuis le début de la crise sanitaire, le président de la République a déjà réalisé des allocutions solennelles le 12 mars, le 16 mars, le 13 avril, et le 14 juin. Il ne s'agissait pas d'interviews mais d'<adresses aux Français>, selon la terminologie de l'Elysée, durant lesquelles le chef de l'Etat a notamment annoncé le confinement et le déconfinement.</p>\n";
    }

    if ( $type == "contact" )
    {
        echo "<form >\n";
        echo "<input type='text' name='blabla' placeholder='votre bla bla ici'>"; 
        echo "</form >\n";
    }



?>