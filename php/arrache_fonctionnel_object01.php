<?php


// 0 chien -> aboie
// 1 chat -> miaule
// 2 poisson -> rien
// ...

$animaux = [ 'chien', 'chat', 'poisson',  'oiseau' ];
$cris    = [ 'aboie', 'miaule', 'rien', 'piaille' ];

echo "<br> Version a l'arrache<br>";


for( $a=0; $a < count( $animaux ) ; $a++ )
{
    echo "$a  ".$animaux[$a]." -> ".$cris[ $a ]."<br>";
} 



$animaux = [ 
    ['chien', "aboie"],
    ['chat', "miaule" ],
    ['poisson', "rien"],
    [ 'oiseau', "piaille" ]
];


echo "<br><br>";
foreach( $animaux as $animal )
{
    echo $animal[0]." -> ".$animal[ 1 ]."<br>";
} 


$animauxKV = [ 
    ['espece' =>'chien', 'cris' => "aboie"],
    ['espece' =>'chat', 'cris' => "miaule" ],
    ['espece' =>'poisson', 'cris' => "rien"],
    ['espece' =>'oiseau', 'cris' => "piaille" ]
];


echo "<br><br>";
foreach( $animauxKV as $animal )
{
echo $animal[ 'espece' ]." -> ".$animal[ 'cris' ]."<br>";
} 

echo "<br> Version Procedurale (ou fonctionnelle)<br>";

function afficheAnimal(  $num )
{
    GLOBAL $animaux, $cris;
    
    $animal = $animaux[ $num ];

    echo $num." ".$animal[0]." -> ".$animal[ 1 ]."<br>";
}

function afficheAnimaux(  $tab )
{
    foreach( $tab as $animal )
    {
        echo $animal[0]." -> ".$animal[ 1 ]."<br>";
    } 
}

function afficheAnimaux2(  $tab )
{
    for( $a=0; $a < count( $tab ) ; $a++ )
    {
        afficheAnimal(  $a );
    } 
}

function afficheAnimalByEspece(  $espece )
{
    GLOBAL $animaux;

    foreach( $animaux as $animal )
    {
        if ( $animal[0] == $espece )
        {
            echo $animal[0]." -> ".$animal[ 1 ]."<br>";
            break;
        }
    } 
}

function getIDAnimalByEspece(  $espece )
{
    GLOBAL $animaux;

    for( $ligne=0 ; $ligne < count($animaux) ; $ligne++ )
    {
        if ( $animaux[$ligne][0] == $espece )
        {
            return $ligne;
        }
    } 
    return -1;
}

for( $a=0; $a < count( $animaux ) ; $a++ )
{
    afficheAnimal(  $a );
} 


afficheAnimaux( $animaux );

echo "<br>";


afficheAnimalByEspece( 'chat');
// 1 chat -> miaule


$id = getIDAnimalByEspece( 'chat');
echo "$id<br>";
afficheAnimal(  $id );

echo "<br><br>";

$id = getIDAnimalByEspece( 'oiseau');
echo "$id<br>";
afficheAnimal(  $id );

//afficheAnimal(  0 );
// 0 chien -> aboie


echo "<br><br> Version Objet<br>";

class Animal
{
    public $espece;
    public $cri;

    public function __construct()
    {
        $this->espece = "rien";
        $this->cri = "rien";
    }

    public function affiche()
    {
        echo $this->espece." -> ".$this->cri."<br>";
    }
}

class Chien extends Animal
{
    public function __construct()
    {
        $this->espece = "chien";
        $this->cri = "aboie";
    }
}

class Chat extends Animal
{
    public function __construct()
    {
        $this->espece = "chat";
        $this->cri = "miaule";
    }
}

class Poisson extends Animal
{
    public function __construct()
    {
        parent::__construct();
        $this->espece = "poisson";
    }
}



$chien = new Chien();
$chat = new Chat();
$poisson = new Poisson();


$listeAnimaux = [ $chien, $chat, $poisson   ];

foreach(  $listeAnimaux as $anim )
    $anim->affiche();



?>