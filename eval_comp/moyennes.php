<?php

include('config/pdo-connect.php');

require_once('config/verifications.php');

userIsLogged();

include('config/getaverage.php');

include('config/head.php');

$x=800;
$y=450;
$marge=50;
$intX=($x-(2*$marge))/12;
$intY=($y-(2*$marge))/10;

if(isset($_GET['pseudo'])) {
    
    if($infos['Admin'] != 0 || $infos['SuperAdmin'] != 0) {
    
        $usermoyenne = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Formations ON Options.FORMATION = Formations.ID_FORMATION WHERE Membres.Pseudo = :pseudo');
        $usermoyenne->bindParam(':pseudo', $_GET['pseudo'], PDO::PARAM_STR);
        $usermoyenne->execute();
        $countmember = $usermoyenne->rowCount();
        
        if($countmember == 1) {
        
            $member = $usermoyenne->fetch();
            
            if($member['Admin'] != 0 || $member['SuperAdmin'] != 0) {
                
                header('location: index.php');
                exit();
                
            }
            
            $moyennes = getAverage($member['ID'], $member['ID_FORMATION']);
            
            $allmonths = $bdd->prepare('SELECT MOIS FROM Resultats WHERE ID_USER = :userid AND FORMATION = :formation GROUP BY MOIS');
            $allmonths->bindParam(':userid', $member['ID'], PDO::PARAM_INT);
            $allmonths->bindParam(':formation', $member['ID_FORMATION'], PDO::PARAM_INT);
            $allmonths->execute();
            $nbroccurence = $allmonths->rowCount();
            
            if($nbroccurence != 0) {
                
                $moisgraphique = array();
                $moisgraphique = $allmonths->fetch();
                
            } else {
                
                $moisgraphique = array();    
                
            }
            
            $count = $bdd->prepare('SELECT COUNT(DISTINCT MOIS) FROM Resultats WHERE ID_USER = :userid AND FORMATION = :formation');
            $count->bindParam(':userid', $member['ID'], PDO::PARAM_INT);
            $count->bindParam(':formation', $member['ID_FORMATION'], PDO::PARAM_INT);
            $count->execute();
            
            $nbrmois = $count->rowCount();
            
        } else {
            
            header('location: ../profil.php');
            exit();
            
        }
    
    } else {
        
        header('location: ../profil.php');
        exit();
        
    }
    
} else {

if($infos['Admin'] != 0 || $infos['SuperAdmin'] != 0) {
    
    header('Location: index.php');
    exit();
    
}

$moyennes = getAverage($_SESSION['id'], $infos['ID_FORMATION']);

$stmt = $bdd->prepare('SELECT MOIS FROM Resultats WHERE ID_USER = :userid AND FORMATION = :formation GROUP BY MOIS');
$stmt->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
$stmt->bindParam(':formation', $infos['ID_FORMATION'], PDO::PARAM_INT);
$stmt->execute();
$nbroccurence = $stmt->rowCount();

if($nbroccurence != 0) {
    
    $moisgraphique = array();
    $moisgraphique = $stmt->fetch();
    
} else {
    
    $moisgraphique = array();    
    
}

$sql = $bdd->prepare('SELECT COUNT(DISTINCT MOIS) FROM Resultats WHERE ID_USER = :userid AND FORMATION = :formation');
$sql->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
$sql->bindParam(':formation', $infos['ID_FORMATION'], PDO::PARAM_INT);
$sql->execute();

$nbrmois = $sql->rowCount();

}

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
for($i=0;$i<$nbrmois;$i++){
    imageline($img,$marge+$i*$intX,$y-$marge-2,$marge+$i*$intX,$y-$marge+2,$noir);
    if(!empty($moisgraphique)) {
        imagettftext($img,13,-45,$marge+$i*$intX,$y-$marge+20,$noir,"./font/FFF_Tusj.ttf",$moisgraphique[$i]);
    }
    if(!isset($moyennes[$i])) {
        imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-(0*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-1,$orange);
        imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-(0*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-(0*100*($y-2*$marge)/1000)+5,$noir);
        imagettftext($img,12,0,$marge+$i*$intX+5,$y-$marge-(0*($y-2*$marge)/1000)-10,$noir,"./font/FFF_Tusj.ttf",0);
    } else {
    imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-1,$orange);
    imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000)+5,$noir);
    imagettftext($img,12,0,$marge+$i*$intX+5,$y-$marge-($moyennes[$i]*($y-2*$marge)/1000)-10,$noir,"./font/FFF_Tusj.ttf",$moyennes[$i]);
    }
}

imagepng($img, "moyenne.png");
myHeader('Moyennes'); 
require_once('config/navbar.php');
?>
<div class="container-fluid banner3 mt-5 p-5">
    <div class="my-5">
        <?php if($nbroccurence == 0 && isset($_GET['pseudo']))  { ?>
            <div class="alert alert-danger text-center mx-auto w-50" role="alert">
                Cet utilisateur ne c'est pas encore auto-évalué !
            </div>
        <?php } elseif($nbroccurence == 0 && !isset($_GET['pseudo'])) { ?> 
            <div class="alert alert-danger text-center mx-auto w-50" role="alert">
                Vous ne vous êtes pas encore auto-évalué !
            </div>
        <?php } else { ?>
            <h1 class="text-center mb-5">
                <?php if(!isset($_GET['pseudo'])) { ?>
                    Vos moyennes
                <?php } else { ?>
                    Moyennes de <?= $member['Pseudo']; ?>
                <?php } ?>
            </h1>
        <?php } ?>
        <img class="rounded mx-auto d-block" src="moyenne.png" />
    </div>
</div>
<?php require_once('config/footer.php'); ?>
<?php print_r($infos['ID_FORMATION']); ?>