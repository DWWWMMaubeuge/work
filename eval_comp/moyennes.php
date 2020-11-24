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
    
        $usermoyenne = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Membres.Pseudo = :pseudo');
        $usermoyenne->bindParam(':pseudo', $_GET['pseudo'], PDO::PARAM_STR);
        $usermoyenne->execute();
        $countmember = $usermoyenne->rowCount();
        
        if($countmember == 1) {
        
            $member = $usermoyenne->fetch();
            
            if($member['Admin'] != 0 || $member['SuperAdmin'] != 0) {
                
                header('location: index.php');
                exit();
                
            }
            
            if(isset($_POST['moyennesession'])) {
                
                $session = $_POST['moyennesession'];
                
            } else {
                
                $session = $member['SESSION'];
                
            }
            
            $moyennes = getAverage($member['ID'], $session);
            
            $allmonths = $bdd->prepare('SELECT MOIS FROM Resultats LEFT JOIN Matieres ON Resultats.ID_SESSION = Matieres.ID_Session WHERE Resultats.ID_USER = :userid AND Resultats.ID_SESSION = :session AND Matieres.Active = TRUE GROUP BY MOIS');
            $allmonths->bindParam(':userid', $member['ID'], PDO::PARAM_INT);
            $allmonths->bindParam(':session', $session, PDO::PARAM_INT);
            $allmonths->execute();
            $nbroccurence = $allmonths->rowCount();
            
            if($nbroccurence != 0) {
                
                $moisgraphique = array();
                $moisgraphique = $allmonths->fetch();
                
            } else {
                
                $moisgraphique = array();    
                
            }
            
            $count = $bdd->prepare('SELECT COUNT(DISTINCT MOIS) FROM Resultats WHERE ID_USER = :userid AND ID_SESSION = :session');
            $count->bindParam(':userid', $member['ID'], PDO::PARAM_INT);
            $count->bindParam(':session', $session, PDO::PARAM_INT);
            $count->execute();
            
            $nbrmois = $count->rowCount();
            
            $sessionsmember = $bdd->prepare('SELECT * FROM FormationsUtilisateur LEFT JOIN Formations ON FormationsUtilisateur.IDENTIFIANT_FORMATION = Formations.ID_FORMATION LEFT JOIN Sessions ON FormationsUtilisateur.IDENTIFIANT_SESSION = Sessions.ID_SESSION WHERE FormationsUtilisateur.USER = :user AND Sessions.STATUS != FALSE ORDER BY FORMATION ASC');
            $sessionsmember->bindParam(':user', $member['ID'], PDO::PARAM_STR);
            $sessionsmember->execute();
            $sessionscount = $sessionsmember->rowCount();
            
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

$alluserformations = $bdd->prepare('SELECT * FROM FormationsUtilisateur LEFT JOIN Formations ON FormationsUtilisateur.IDENTIFIANT_FORMATION = Formations.ID_FORMATION LEFT JOIN Sessions ON FormationsUtilisateur.IDENTIFIANT_SESSION = Sessions.ID_SESSION WHERE FormationsUtilisateur.USER = :user AND Sessions.STATUS != FALSE ORDER BY FORMATION ASC');
$alluserformations->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
$alluserformations->execute();
$countformations = $alluserformations->rowCount();

if(isset($_POST['moyennesession'])) {

    $session = $_POST['moyennesession'];

} else {
    
    $session = $infos['SESSION'];
    
}

$moyennes = getAverage($_SESSION['id'], $session);

$nbrresultats = $bdd->prepare('SELECT MOIS FROM Resultats LEFT JOIN Matieres ON Resultats.ID_SESSION = Matieres.ID_Session WHERE Resultats.ID_USER = :userid AND Resultats.ID_SESSION = :session AND Matieres.Active = TRUE GROUP BY MOIS');
$nbrresultats->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
$nbrresultats->bindParam(':session', $session, PDO::PARAM_INT);
$nbrresultats->execute();
$nbroccurence = $nbrresultats->rowCount();

if($nbroccurence != 0) {
    
    $moisgraphique = array();
    $moisgraphique = $nbrresultats->fetch();
    
} else {
    
    $moisgraphique = array();    
    
}

$countmonths = $bdd->prepare('SELECT COUNT(DISTINCT MOIS) FROM Resultats WHERE ID_USER = :userid AND ID_SESSION = :session');
$countmonths->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
$countmonths->bindParam(':session', $session, PDO::PARAM_INT);
$countmonths->execute();

$nbrmois = $countmonths->rowCount();

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

imagepng($img, "moyennes.png");
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
        <?php 
    
        if(!isset($_GET['pseudo'])) {
            
            if($countformations != 0) {
            
                if($countformations > 1) { ?>
                
                    <form method="POST" class="text-center" id="form-moyennes">
                        <select name="moyennesession" id="moyennesession" onchange="getMoyennes(this.id, this.value)">
                            <?php while($userformations = $alluserformations->fetch()) { ?>
                            
                               <option value="<?= $userformations['IDENTIFIANT_SESSION']; ?>" <?php if(isset($_POST['moyennesession'])) { if($_POST['moyennesession'] == $userformations['IDENTIFIANT_SESSION']) { ?> selected <?php } ?><?php } elseif($userformations['IDENTIFIANT_SESSION'] == $infos['SESSION']) { ?> selected <?php } ?>><?= $userformations['FORMATION']; ?> ( Session du <?= dateConvert($userformations['DATE_DEBUT']); ?> au <?= dateConvert($userformations['DATE_FIN']); ?> à <?= $userformations['EMPLACEMENT']; ?> )</option>
                                    
                            <?php } ?>
                            
                        </select>
                    </form>
                    
                <?php } else { ?>
                
                    <form method="POST" class="text-center" id="form-moyennes">
                        <select name="moyennesession" id="moyennesession" onchange="getMoyennes(this.id, this.value)">
                            <?php while($userformations = $alluserformations->fetch()) { ?>
                            
                                <option value="<?= $userformations['IDENTIFIANT_SESSION']; ?>" <?php if(isset($_POST['moyennesession'])) { if($_POST['moyennesession'] == $userformations['IDENTIFIANT_SESSION']) { ?> selected <?php } ?><?php } elseif($userformations['IDENTIFIANT_SESSION'] == $infos['SESSION']) { ?> selected <?php } ?>><?= $userformations['FORMATION']; ?> ( Session du <?= dateConvert($userformations['DATE_DEBUT']); ?> au <?= dateConvert($userformations['DATE_FIN']); ?> à <?= $userformations['EMPLACEMENT']; ?> )</option>
                                
                            <?php } ?>
                            
                        </select>
                    </form>
                
                <?php } ?>
            
            <?php } ?>
            
        <?php } ?>
        
        <?php if(isset($_GET['pseudo'])) {
            
            if($sessionscount != 0) {
            
                if($sessionscount > 1) { ?>
                    
                    <form method="POST" class="text-center" id="form-moyennes">
                        <select name="moyennesession" id="moyennesession" onchange="getMoyennes(this.id, this.value)">
                            <?php while($membersession = $sessionsmember->fetch()) { ?>
                            
                                <option value="<?= $membersession['IDENTIFIANT_SESSION']; ?>" <?php if(isset($_POST['moyennesession'])) { if($_POST['moyennesession'] == $membersession['IDENTIFIANT_SESSION']) { ?> selected <?php } ?><?php } elseif($membersession['IDENTIFIANT_SESSION'] == $member['SESSION']) { ?> selected <?php } ?>><?= $membersession['FORMATION']; ?> ( Session du <?= dateConvert($membersession['DATE_DEBUT']); ?> au <?= dateConvert($membersession['DATE_FIN']); ?> à <?= $membersession['EMPLACEMENT']; ?> )</option>
                                
                            <?php } ?>
                            
                        </select>
                    </form>
                    
                <?php } else { ?>
                    
                    <form method="POST" class="text-center" id="form-moyennes">
                        <select name="moyennesession" id="moyennesession" onchange="getMoyennes(this.id, this.value)">
                            <?php while($membersession = $sessionsmember->fetch()) { ?>
                            
                                <option value="<?= $membersession['IDENTIFIANT_SESSION']; ?>" <?php if(isset($_POST['moyennesession'])) { if($_POST['moyennesession'] == $membersession['IDENTIFIANT_SESSION']) { ?> selected <?php } ?><?php } elseif($membersession['IDENTIFIANT_SESSION'] == $member['SESSION']) { ?> selected <?php } ?>><?= $membersession['FORMATION']; ?> ( Session du <?= dateConvert($membersession['DATE_DEBUT']); ?> au <?= dateConvert($membersession['DATE_FIN']); ?> à <?= $membersession['EMPLACEMENT']; ?> )</option>
                                
                            <?php } ?>
                            
                        </select>
                    </form>
                    
                <?php } ?>
            
            <?php } ?>
            
        <?php } ?>
        <img class="rounded mx-auto mt-5 d-block" src="moyennes.png" />
    </div>
</div>
<script src="scripts/moyennes.js"></script>
<?php require_once('config/footer.php'); ?>