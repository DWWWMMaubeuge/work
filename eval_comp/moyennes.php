<?php

include('config/pdo-connect.php');

include('config/getaverage.php');

header('Content-type:image/png');

$x=800;
$y=500;
$marge=50;
$intX=($x-(2*$marge))/12;
$intY=($y-(2*$marge))/10;

$moyennes = getAverage($_SESSION['id'], $infos['ID_FORMATION']);

$mois = array(
    "NOV","DEC","JAN","FEV","MAR","AVR","MAI","JUI","JUL","AOU","SEP","OCT"
);

$img=imagecreatetruecolor($x,$y);
$noir=imagecolorallocate($img,0,0,0);
$blanc=imagecolorallocate($img,255,255,255);
$orange=imagecolorallocate($img,220,100,0);
$gris=imagecolorallocate($img,220,220,220);
imagefill($img,0,0,$blanc);
imageline($img,$marge,$y-$marge,$x-$marge,$y-$marge,$noir);
imageline($img,$marge,$y-$marge,$marge,$marge,$noir);
imagettftext($img,20,0,$x-$marge-15,$y-$marge+30,$noir,"./font/FFF_Tusj.ttf","Mois");
imagettftext($img,20,0,$marge-45,$marge-25,$noir,"./font/FFF_Tusj.ttf","Moyennes");
for($i=0;$i<=10;$i++){
    imageline($img,$marge-2,$y-$marge-($i*$intY),$marge+2,$y-$marge-($i*$intY),$noir);
    imagettftext($img,15,0,$marge-45,$y-$marge-($i*$intY),$noir,"./font/FFF_Tusj.ttf",$i);
    if($i>0)
        imageline($img,$marge+2,$y-$marge-($i*$intY),$x-$marge,$y-$marge-($i*$intY),$gris);
}
for($i=0;$i<12;$i++){
    imageline($img,$marge+$i*$intX,$y-$marge-2,$marge+$i*$intX,$y-$marge+2,$noir);
    imagettftext($img,13,-45,$marge+$i*$intX,$y-$marge+20,$noir,"./font/FFF_Tusj.ttf",$mois[$i]);
    imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-1,$orange);
    imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000)+5,$noir);
    imagettftext($img,12,0,$marge+$i*$intX+5,$y-$marge-($moyennes[$i]*($y-2*$marge)/1000)-10,$noir,"./font/FFF_Tusj.ttf",$moyennes[$i]);
}

imagepng($img);


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!CODE POUR WEBHOST JUSTE EN DESSOUS!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// include('config/pdo-connect.php');

// include('config/getaverage.php');

//include('config/head.php');

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// header('Content-type:image/png');    Décommenter pour ne render que l'image et pas de code html */
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $x=800;
// $y=500;
// $marge=50;
// $intX=($x-(2*$marge))/12;
// $intY=($y-(2*$marge))/10;

// $moyennes = getAverage($_SESSION['id'], $infos['ID_FORMATION']);

// $mois = array(
//     "NOV","DEC","JAN","FEV","MAR","AVR","MAI","JUI","JUL","AOU","SEP","OCT"
// );

// $img=imagecreatetruecolor($x,$y);
// $noir=imagecolorallocate($img,0,0,0);
// $blanc=imagecolorallocate($img,255,255,255);
// $orange=imagecolorallocate($img,220,100,0);
// $gris=imagecolorallocate($img,220,220,220);
// imagefill($img,0,0,$blanc);
// imageline($img,$marge,$y-$marge,$x-$marge,$y-$marge,$noir);
// imageline($img,$marge,$y-$marge,$marge,$marge,$noir);
// imagettftext($img,20,0,$x-$marge-15,$y-$marge+30,$noir,"./font/FFF_Tusj.ttf","Mois");
// imagettftext($img,20,0,$marge-45,$marge-25,$noir,"./font/FFF_Tusj.ttf","Moyennes");
// for($i=0;$i<=10;$i++){
//     imageline($img,$marge-2,$y-$marge-($i*$intY),$marge+2,$y-$marge-($i*$intY),$noir);
//     imagettftext($img,15,0,$marge-45,$y-$marge-($i*$intY),$noir,"./font/FFF_Tusj.ttf",$i);
//     if($i>0)
//         imageline($img,$marge+2,$y-$marge-($i*$intY),$x-$marge,$y-$marge-($i*$intY),$gris);
// }
// for($i=0;$i<12;$i++){
//     imageline($img,$marge+$i*$intX,$y-$marge-2,$marge+$i*$intX,$y-$marge+2,$noir);
//     imagettftext($img,13,-45,$marge+$i*$intX,$y-$marge+20,$noir,"./font/FFF_Tusj.ttf",$mois[$i]);
//     if(!isset($moyennes[$i])) {
//         imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-(0*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-1,$orange);
//         imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-(0*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-(0*100*($y-2*$marge)/1000)+5,$noir);
//         imagettftext($img,12,0,$marge+$i*$intX+5,$y-$marge-(0*($y-2*$marge)/1000)-10,$noir,"./font/FFF_Tusj.ttf",0);
//     } else {
//     imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-1,$orange);
//     imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000)+5,$noir);
//     imagettftext($img,12,0,$marge+$i*$intX+5,$y-$marge-($moyennes[$i]*($y-2*$marge)/1000)-10,$noir,"./font/FFF_Tusj.ttf",$moyennes[$i]);
//     }
// }

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!! imagepng($img);    Décommenter pour ne render que l'image et pas de code html */ !!!
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// imagepng($img, "moyenne.png");
// myHeader('Moyenne'); 
// require_once('config/navbar.php');
?>
<!-- <div class="container-fluid banner3 mt-5 p-5">
    <div class="my-5">
        <img class="rounded mx-auto d-block" src="moyenne.png" />
    </div>
</div> -->
<?php  // require_once('config/footer.php'); ?>