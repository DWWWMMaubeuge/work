<?php

    $tab = [];

    array_push( $tab, "toto" );
    array_push( $tab, "tutu" );
    array_push( $tab, "titi" );

    print_r( $tab );
    echo "<br>";

    $element = array_pop($tab);
    echo "$element<br>";

    print_r( $tab );
    echo "<br>";

    array_unshift( $tab, "deux" );
    array_unshift( $tab, "un" );

    print_r( $tab );
    echo "<br>";

    $element = array_shift($tab);
    echo "$element<br>";

    print_r( $tab );
    echo "<br>";


?>