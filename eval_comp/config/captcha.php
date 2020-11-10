<?php 

$ncarac = 5;
$nlignes = 7;
$carac = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
$nca = count($carac);
$font = './font/FFF_Tusj.ttf';
$x = $ncarac*30+10;
$y = 40;
$img = imagecreatetruecolor($x,$y);
imagefill($img,0,0,imagecolorallocate($img, 255,255,255));
$chaine = "";

for($i=1; $i<=$ncarac; $i++){
    $c = $carac[rand(0,($nca-1))];
    imagettftext($img, 25, rand(-10,10), (($i-1)*30)+5, 30, imagecolorallocate($img, rand(0,100), rand(0,100), rand(0,100)),$font, $c);
    $chaine .= $c;
}

for($i=1;$i<=$nlignes;$i++) {
        imagesetthickness($img,rand(1,2));
        imageline($img,rand(0,$x),rand(0,$y),rand(0,$x),rand(0,$y), imagecolorallocate($img, rand(0,100), rand(0,100), rand(0,100)));
}

$_SESSION['captcha'] = $chaine;
imagepng($img, "captcha.png");

?>