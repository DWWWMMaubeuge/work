<?php

    function affTab2D( $tab )
    {
        echo "<table>\n";
          for( $i=0 ; $i < count( $tab ) ; $i++ )
          {
                echo "<tr>\n";
                  $ligne = $tab[ $i ];
                  for( $j=0 ; $j < count( $ligne ) ; $j++ )
                      echo "<td>".$ligne[ $j ]."</td>\n";
                echo "</tr>\n";
          }
        echo "</table>\n";
    }


     $tab2D = [ 
                [ 3, 'tutu', 2.14 ],
                [ '59', 'bibi', 'nord', 'pôle' ],
                [ '62', 'bobo', 'PDC' ]
               ];


    for( $a=0 ; $a < count( $tab2D ) ; $a++ )
    {
        $ligne = $tab2D[ $a ];
        for( $b=0 ; $b < count( $ligne ) ; $b++ )
            echo $ligne[ $b ]."\n";
    }

    echo "<br>\n";

    affTab2D( $tab2D );
?>