<?php

$input = [ "a", "b", "c", "d", "e", "f", "g" ];
print_r( $input );
echo "<br>";

$output = array_slice($input, 2, 3);         // retourne "c", "d", et "e"
print_r( $output );
echo "<br>";
echo "<br>";


$output = array_slice($input, -4,  -2);     // retourne "d"
print_r( $output );
echo "<br>";
echo "<br>";


?>