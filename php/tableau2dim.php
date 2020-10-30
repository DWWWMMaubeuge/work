<?php


$tableau = [ "toto", "tata", "titi" ];

$tableau2D = [ 
    ["toto", 11, 167],   // 0  
    ["tata", 19, 188 ],  // 1
    ["titi", 22, 175 ]   // 2
];


echo $tableau2D[ 1 ][0];  // prenom de la lige 1
echo $tableau2D[ 1 ][1];  // l'age de la lige 1
?>