<?php

include('config/pdo-connect.php');

require_once('config/verifications.php');

userIsLogged(); // Vérification si l'utilisateur est connecté

include('config/getaverage.php');

include('config/head.php');

$x=800; // Reglage de la longueur de l'image du graphique (en px)
$y=450; // Reglage de la hauteur de l'image du graphique (en px)
$marge=50; // Reglage de la marge
$intX=($x-(2*$marge))/12; // Calcul de la marge latérale entre deux dates
$intY=($y-(2*$marge))/10; // Calcul de la marge verticale entre deux graduation de moyennes

// Si un pseudo est passé en paramètre dans l'url:
if(isset($_GET['pseudo'])) {
    
    // Si l'utilisateur qui affiche le graphique est un Admin ou un SuperAdmin
    if($infos['Admin'] != 0 || $infos['SuperAdmin'] != 0) {
        
        // Selection de toutes les données de la cible passé en paramètre dans l'url grâce à son pseudo
        $usermoyenne = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Membres.Pseudo = :pseudo');
        $usermoyenne->bindParam(':pseudo', $_GET['pseudo'], PDO::PARAM_STR);
        $usermoyenne->execute();
        // Comptage du nombre de résultats
        $countmember = $usermoyenne->rowCount();
        
        // Si un résultat existe:
        if($countmember == 1) {
            
            // Récupération de toutes les données de la cible et stockage dans une variable
            $member = $usermoyenne->fetch();
            
            // Si la cible est un Admin ou un SuperAdmin:
            if($member['Admin'] != 0 || $member['SuperAdmin'] != 0) {
                
                // Redirection de l'utilisateur vers l'accueil
                header('location: index.php');
                exit();
                
            }
            
            // Si l'utilisateur à choisis les moyennes d'une session particulière à afficher:
            if(isset($_POST['moyennesession'])) {
                
                // La variable session sera égale à la session que l'utilisateur a choisi
                $session = $_POST['moyennesession'];
                
            } else {
                
                // Sinon la variable session sera égale à la session active de la cible
                $session = $member['SESSION'];
                
            }
            
            // Récupération de toutes les moyennes de la cible selon son id utilisateur et la session
            $moyennes = getAverage($member['ID'], $session);
            
            // Selection de touts les mois dans la base de données des résultats où la cible apparait selon son id utilisateur et la session. Récupération de chaque mois une seule fois si ils apparaissent plusieurs fois dans la base de données.
            $allmonths = $bdd->prepare('SELECT MOIS FROM Resultats LEFT JOIN Matieres ON Resultats.ID_SESSION = Matieres.ID_Session WHERE Resultats.ID_USER = :userid AND Resultats.ID_SESSION = :session AND Matieres.Active = TRUE GROUP BY MOIS');
            $allmonths->bindParam(':userid', $member['ID'], PDO::PARAM_INT);
            $allmonths->bindParam(':session', $session, PDO::PARAM_INT);
            $allmonths->execute();
            // Comptage du nombre de résultats
            $nbroccurence = $allmonths->rowCount();
            
            // Si au moins un résultat existe:
            if($nbroccurence != 0) {
                
                // Création d'un tableau vide qui contiendra les mois
                $moisgraphique = array();
                // Ajouts de toutes les mois récupéré dans le tableau des mois du graphiques
                $moisgraphique = $allmonths->fetch();
            
            // Si aucun résultat n'existe:
            } else {
                
                // Création d'un tableau vide pour les mois
                $moisgraphique = array();    
                
            }
            
            // Comptage du nombre de mois dans la base de données selon l'id de la cible et la session
            $count = $bdd->prepare('SELECT COUNT(DISTINCT MOIS) FROM Resultats WHERE ID_USER = :userid AND ID_SESSION = :session');
            $count->bindParam(':userid', $member['ID'], PDO::PARAM_INT);
            $count->bindParam(':session', $session, PDO::PARAM_INT);
            $count->execute();
            // Comptage du nombre de résultats
            $nbrmois = $count->rowCount();
            
            // Selection de toutes les sessions de formations auquel la cible est inscrite selon son id utilisateur
            $sessionsmember = $bdd->prepare('SELECT * FROM FormationsUtilisateur LEFT JOIN Formations ON FormationsUtilisateur.IDENTIFIANT_FORMATION = Formations.ID_FORMATION LEFT JOIN Sessions ON FormationsUtilisateur.IDENTIFIANT_SESSION = Sessions.ID_SESSION WHERE FormationsUtilisateur.USER = :user AND Sessions.STATUS != FALSE ORDER BY FORMATION ASC');
            $sessionsmember->bindParam(':user', $member['ID'], PDO::PARAM_STR);
            $sessionsmember->execute();
            // Comptage du nombre de résultat
            $sessionscount = $sessionsmember->rowCount();
        
        // Si aucun membre avec ce pseudo n'existe:
        } else {
            
            // Redirection de l'utilisateur vers son profil
            header('location: ../profil.php');
            exit();
            
        }
    
    // Si l'utilisateur n'est pas un Admin ou un SuperAdmin:
    } else {
        
        // Redirection de l'utilisateur vers son profil
        header('location: ../profil.php');
        exit();
        
    }

// Si aucun pseudo n'est passé en paramètre dans l'url:
} else {

// Vérification si l'utilisateur est un Admin ou un SuperAdmin
if($infos['Admin'] != 0 || $infos['SuperAdmin'] != 0) {
    
    // Redirection de l'utilisateur vers son profil si c'est le cas
    header('Location: ../profil.php');
    exit();
    
}

// Selection de toutes les sessions de formations de l'utilisateur
$alluserformations = $bdd->prepare('SELECT * FROM FormationsUtilisateur LEFT JOIN Formations ON FormationsUtilisateur.IDENTIFIANT_FORMATION = Formations.ID_FORMATION LEFT JOIN Sessions ON FormationsUtilisateur.IDENTIFIANT_SESSION = Sessions.ID_SESSION WHERE FormationsUtilisateur.USER = :user AND Sessions.STATUS != FALSE ORDER BY FORMATION ASC');
$alluserformations->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
$alluserformations->execute();
// Comptage du nombre de résultats
$countformations = $alluserformations->rowCount();

// Si l'utilisateur à choisis les moyennes d'une session particulière à afficher:
if(isset($_POST['moyennesession'])) {
    
    // La variable session sera égale à la session que l'utilisateur a choisi
    $session = $_POST['moyennesession'];

} else {
    
    // Sinon la variable session sera égale à la session active de l'utilisateur
    $session = $infos['SESSION'];
    
}

// Récupération de toutes les moyennes de l'utilisateur selon son id utilisateur et la session
$moyennes = getAverage($_SESSION['id'], $session);

// Selection de touts les mois dans la base de données des résultats où l'utilisateur apparait selon son id et la session. Récupération de chaque mois une seule fois si ils apparaissent plusieurs fois dans la base de données.
$nbrresultats = $bdd->prepare('SELECT MOIS FROM Resultats LEFT JOIN Matieres ON Resultats.ID_SESSION = Matieres.ID_Session WHERE Resultats.ID_USER = :userid AND Resultats.ID_SESSION = :session AND Matieres.Active = TRUE GROUP BY MOIS');
$nbrresultats->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
$nbrresultats->bindParam(':session', $session, PDO::PARAM_INT);
$nbrresultats->execute();
// Comptage du nombre de résultats
$nbroccurence = $nbrresultats->rowCount();

// Si au moins un résultat existe:
if($nbroccurence != 0) {
    
    // Création d'un tableau vide qui contiendra les mois
    $moisgraphique = array();
    // Ajouts de toutes les mois récupéré dans le tableau des mois du graphiques
    $moisgraphique = $nbrresultats->fetch();
    
} else {
    
    // Création d'un tableau vide pour les mois
    $moisgraphique = array();    
    
}

// Comptage du nombre de mois dans la base de données selon l'id de l'utilisateur et la session
$countmonths = $bdd->prepare('SELECT COUNT(DISTINCT MOIS) FROM Resultats WHERE ID_USER = :userid AND ID_SESSION = :session');
$countmonths->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
$countmonths->bindParam(':session', $session, PDO::PARAM_INT);
$countmonths->execute();
// Comptage du nombre de résultats
$nbrmois = $countmonths->rowCount();

}

// On crée l'image de base
$img=imagecreatetruecolor($x,$y);
// Définition de la couleur noire
$noir=imagecolorallocate($img,0,0,0);
// Définition de la couleur blanche
$blanc=imagecolorallocate($img,255,255,255);
// Définition de la couleur orange
$orange=imagecolorallocate($img,220,100,0);
// Définition de la couleur grise
$gris=imagecolorallocate($img,220,220,220);
imagefill($img,0,0,$blanc); // Remplissage de l'image avec la couleur blanche
// Création d'une ligne noire du coté gauche et sur toute la hauteur de l'image, calculé selon la marge
imageline($img,$marge,$y-$marge,$x-$marge,$y-$marge,$noir);
// Création d'une ligne noire du coté bas et sur toute la largeur de l'image, calculé selon la marge
imageline($img,$marge,$y-$marge,$marge,$marge,$noir);
// Création du mot "Mois" en bas à droite de l'image
imagettftext($img,20,0,$x-$marge-15,$y-$marge+30,$noir,"./font/FFF_Tusj.ttf","Mois");
// Création du mot "Moyennes" en haut à gauche de l'image
imagettftext($img,20,0,$marge-45,$marge-25,$noir,"./font/FFF_Tusj.ttf","Moyennes");
// Création de la graduation verticale sur le graphique:
for($i=0;$i<=10;$i++){
    // Création de la ligne
    imageline($img,$marge-2,$y-$marge-($i*$intY),$marge+2,$y-$marge-($i*$intY),$noir);
    // Création du texte de couleur noir contenant la valeur de la graduation
    imagettftext($img,15,0,$marge-45,$y-$marge-($i*$intY),$noir,"./font/FFF_Tusj.ttf",$i);
    if($i>0) {
        // Création du quadrillage pour chaque graduation
        imageline($img,$marge+2,$y-$marge-($i*$intY),$x-$marge,$y-$marge-($i*$intY),$gris);
    }
}
// Pour chaque mois présent dans les résultats dans la base de données:
for($i=0;$i<$nbrmois;$i++){
    // Création d'une ligne noire
    imageline($img,$marge+$i*$intX,$y-$marge-2,$marge+$i*$intX,$y-$marge+2,$noir);
    // Si le tableaux des mois du graphique n'est pas vide:
    if(!empty($moisgraphique)) {
        // Création du texte de couleur noir contenant le nom des mois
        imagettftext($img,13,-45,$marge+$i*$intX,$y-$marge+20,$noir,"./font/FFF_Tusj.ttf",$moisgraphique[$i]);
    }
    // Si les moyennes n'existent pas:
    if(!isset($moyennes[$i])) {
        // Création d'un rectangle orange qui se situera à la valeur 0 des moyennes
        imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-(0*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-1,$orange);
        // Création d'un rectangle noir qui se situera qui se situera à la valeur 0 des moyennes
        imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-(0*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-(0*100*($y-2*$marge)/1000)+5,$noir);
        // Création du texte de couleur noir contenant la valeur "0" et qui se situera au dessus du rectangle noir
        imagettftext($img,12,0,$marge+$i*$intX+5,$y-$marge-(0*($y-2*$marge)/1000)-10,$noir,"./font/FFF_Tusj.ttf",0);
    } else {
    // Création d'un rectangle orange qui fera la hauteur de la moyenne - une marge verticale
    imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-1,$orange);
    // Création d'un rectangle noir qui se situera entre la hauteur du rectangle orange et la valeur de la moyenne
    imagefilledrectangle($img,$marge+$i*$intX+1,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000),$marge+$i*$intX+40,$y-$marge-($moyennes[$i]*100*($y-2*$marge)/1000)+5,$noir);
    // Création du texte contenant la valeur de la moyenne à l'intérieur du rectangle orange et en bas de celui-ci
    imagettftext($img,12,0,$marge+$i*$intX+5,$y-$marge-($moyennes[$i]*($y-2*$marge)/1000)-10,$noir,"./font/FFF_Tusj.ttf",$moyennes[$i]);
    }
}

// Création de l'image du graphique
imagepng($img, "moyennes.png");
myHeader('Moyennes'); 
require_once('config/navbar.php');
?>
<div class="container-fluid banner3 mt-5 p-5">
    <div class="my-5">
        <!-- Si la cible ne c'est pas encore évalué -->
        <?php if($nbroccurence == 0 && isset($_GET['pseudo']))  { ?>
            <div class="alert alert-danger text-center mx-auto w-50" role="alert">
                Cet utilisateur ne c'est pas encore auto-évalué !
            </div>
        <!-- Si l'utilisateur ne c'est pas encore évalué -->
        <?php } elseif($nbroccurence == 0 && !isset($_GET['pseudo'])) { ?> 
            <div class="alert alert-danger text-center mx-auto w-50" role="alert">
                Vous ne vous êtes pas encore auto-évalué !
            </div>
        <!-- Si la cible c'est déjà évalué -->
        <?php } else { ?>
            <h1 class="text-center mb-5">
                <?php if(!isset($_GET['pseudo'])) { ?>
                    Vos moyennes
                <!-- Si l'utilisateur c'est déjà évalué-->
                <?php } else { ?>
                    Moyennes de <?= $member['Pseudo']; ?>
                <?php } ?>
            </h1>
        <?php } ?>
        <?php 
        
        // Si aucun pseudo n'est passé en paramètre dans l'url:
        if(!isset($_GET['pseudo'])) {
            
            // Si le nombre de session de formation de l'utilisateur est différent de 0:
            if($countformations != 0) {
                
                // Si plus d'une session de formation existe pour l'utilisateur:
                if($countformations > 1) { ?>
                    
                    <!-- Sélecteur de session de formation-->
                    <form method="POST" class="text-center" id="form-moyennes">
                        <select name="moyennesession" id="moyennesession" onchange="getMoyennes(this.id, this.value)">
                            <?php while($userformations = $alluserformations->fetch()) { ?>
                            
                               <option value="<?= $userformations['IDENTIFIANT_SESSION']; ?>" <?php if(isset($_POST['moyennesession'])) { if($_POST['moyennesession'] == $userformations['IDENTIFIANT_SESSION']) { ?> selected <?php } ?><?php } elseif($userformations['IDENTIFIANT_SESSION'] == $infos['SESSION']) { ?> selected <?php } ?>><?= $userformations['FORMATION']; ?> ( Session du <?= dateConvert($userformations['DATE_DEBUT']); ?> au <?= dateConvert($userformations['DATE_FIN']); ?> à <?= $userformations['EMPLACEMENT']; ?> )</option>
                                    
                            <?php } ?>
                            
                        </select>
                    </form>
                    
                <!--Sinon on affiche un select avec la seule session de formation de l'utilisateur-->
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
        
        <!-- Si un pseudo est passé en paramètre dans l'url: -->
        <?php if(isset($_GET['pseudo'])) {
            
            // Si le nombre de session de formation de la cible est différent de 0:
            if($sessionscount != 0) {
                
                // Si plus d'une session de formation existe pour la cible:
                if($sessionscount > 1) { ?>
                    
                    <!-- Sélecteur de session de formation-->
                    <form method="POST" class="text-center" id="form-moyennes">
                        <select name="moyennesession" id="moyennesession" onchange="getMoyennes(this.id, this.value)">
                            <?php while($membersession = $sessionsmember->fetch()) { ?>
                            
                                <option value="<?= $membersession['IDENTIFIANT_SESSION']; ?>" <?php if(isset($_POST['moyennesession'])) { if($_POST['moyennesession'] == $membersession['IDENTIFIANT_SESSION']) { ?> selected <?php } ?><?php } elseif($membersession['IDENTIFIANT_SESSION'] == $member['SESSION']) { ?> selected <?php } ?>><?= $membersession['FORMATION']; ?> ( Session du <?= dateConvert($membersession['DATE_DEBUT']); ?> au <?= dateConvert($membersession['DATE_FIN']); ?> à <?= $membersession['EMPLACEMENT']; ?> )</option>
                                
                            <?php } ?>
                            
                        </select>
                    </form>
                    
                <!--Sinon on affiche un select avec la seule session de formation de la cible-->
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
        <!-- Affichage du graphique -->
        <img class="rounded mx-auto mt-5 d-block" src="moyennes.png" />
    </div>
</div>
<!-- Lien vers le script du graphique des moyennes -->
<script src="scripts/moyennes.js"></script>
<?php require_once('config/footer.php'); ?>