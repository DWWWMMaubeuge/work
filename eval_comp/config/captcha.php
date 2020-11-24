<?php 

$ncarac = 5; // Nombre de caractères du captcha
$nlignes = 7; // Nombre de lignes qui le recouvriront
$carac = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$nca = count($carac); // Comptage du nombre de caractères
$font = '../font/FFF_Tusj.ttf'; // Reglage de la police d'écriture
$x = $ncarac*30+10; // Reglage de la longueur de l'image du captcha
$y = 40; // Reglage de la hauteur
$img = imagecreatetruecolor($x,$y); // On crée l'image de base
imagefill($img,0,0,imagecolorallocate($img, 255,255,255)); // On remplit l'image avec la couleur blanche
$chaine = ""; // Création de la variable qui contiendra la chaine de caractères que l'utilisateur devra recopier

for($i=1; $i<=$ncarac; $i++){ // Pour chaque caractères, selon le nombre de caractères définit plus haut:

    $c = $carac[rand(0,($nca-1))]; // creation d'une variable $c qui contiendra un caractère aléatoire
    imagettftext($img, 25, rand(-10,10), (($i-1)*30)+5, 30, imagecolorallocate($img, rand(0,100), rand(0,100), rand(0,100)),$font, $c);
    // Création de "l'image" de ce caractère et insertion de celui ci dans l'image du captcha
    $chaine .= $c; // Insertion du caractère créé dans la chaine que l'utilisateur doit recopier

}

for($i=1;$i<=$nlignes;$i++) { // Pour chaque lignes, selon le nombre de lignes:

    imagesetthickness($img,rand(1,2)); // Reglage de la taille d'une ligne
    imageline($img,rand(0,$x),rand(0,$y),rand(0,$x),rand(0,$y), imagecolorallocate($img, rand(0,100), rand(0,100), rand(0,100)));
    //Creation de la ligne, sa position et sa couleur sont définies aléatoirement sur l'image.

}

$_SESSION['captcha'] = $chaine; // Insertion de la chaine dans la superglobale SESSION
imagepng($img, "captcha.png"); 
/* Création et nommage du captcha créé et insertion de celui-ci dans une variable php qui sera
   utilisée plus tard en html pour le faire apparaitre via une balise <img src="" /> */

?>