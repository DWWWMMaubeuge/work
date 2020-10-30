<?php

$tableau = [
    [ "1.1", "1.2"],
    [ "2.1", "2.2", "2.3"], 
    [ "3.1", "3.2"]
            ]; 


// 1.1   |  1.2   |
// 2.1   |  2.2   |

echo "<br><br>à l'arrache<br>";
echo "<table border=\"solid\">\n";
for( $ligne=0 ; $ligne < count(  $tableau ) ; $ligne++ )
{
    echo "<tr>\n";
    $ligneTab = $tableau[ $ligne ];
    for( $colone=0 ; $colone < count(  $ligneTab ) ; $colone++ )
        echo "<td>".$ligneTab[$colone]."</td>\n";

    echo "</tr>\n";
}
echo "</table>\n";

echo "<br><br>procedurale ou fonctionnelle<br>";


function affTD( $data )
{
    echo "<td>$data</td>\n";
}


function affTableau( $tab )
{
    echo "<table border=\"solid\">\n";
    for( $ligne=0 ; $ligne < count(  $tab ) ; $ligne++ )
    {
        echo "<tr>\n";
        $ligneTab = $tab[ $ligne ];
        for( $colone=0 ; $colone < count(  $ligneTab ) ; $colone++ )
            affTD( $ligneTab[$colone] );

        echo "</tr>\n";
    }
    echo "</table>\n";
}

affTableau( $tableau );

echo "<br><br>objet<br>";
class Tableau
{
    private $tab;

    public function __construct( $t )
    {
        $this->tab = $t;
    }


    public function affTableau2()
    {
        $this->affTableau();
    }

    public function affTableau()
    {
        affTableau( $this->tab );
    }
}

$TabObj = new Tableau(  $tableau  );
$TabObj->affTableau();
$TabObj->affTableau2();



class TableauAZ
{
    private $tab;

    public function __construct( )
    {
        echo "je suis dans le constructeur<br>";
    }

    public function __destruct( )
    {
        echo "je suis dans le destructeur<br>";
    }
}

$TabObjAZ = new TableauAZ();
$TabObjAZ = null;

?>