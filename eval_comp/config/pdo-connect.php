<?php

session_start();

// Infos de connexion à la bdd
$servername = "localhost";
$username = "";
$password = "";

GLOBAL $bdd;
GLOBAL $infos;
GLOBAL $userIP;
GLOBAL $userOS;
GLOBAL $userBrowser;

// Essai de la connexion à la base de données
try {

  $bdd = new PDO("mysql:host=$servername;dbname=id15316558_dwm_maubeuge", $username, $password);
  $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Capture des erreurs si elles existent
} catch(PDOException $e) {

    echo $e->getMessage();
    
}

// Fichier contenant les fonctions de vérifications de l'authenticité d'un utilisateur
include('securisation.php');

// Vérification si l'utilisateur c'est connecter à son compte sur le site
if(isset($_SESSION['id'])) {
    
    // Récupération et stockage de l'adresse ip, du navigateur et du système d'exploitation de l'appareil connecté sur le compte de l'utilisateur
    $userIP = get_ip();
    $userOS = detect_os();
    $userBrowser = detect_browser();
  
    // Si l'utilisateur n'a pas son ip, la version de son navigateur ou la version de son os stocké dans la superglobale de session alors que normalement il est censé être passé par le formulaire de connexion ou si ils ne correspondent pas à ce qui a été stocké lors de la connexion:
    if(!isset($_SESSION['ip']) || !isset($_SESSION['os']) || !isset($_SESSION['browser']) || $userIP != $_SESSION['ip'] || $userOS != $_SESSION['os'] || $userBrowser != $_SESSION['browser']) {
        
        // Récupération de l'email du compte pour le mail d'alerte
        $getEmail = $bdd->prepare('SELECT Email FROM Membres WHERE ID = :user');
        $getEmail->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
        $getEmail->execute();
        
        $emailToAlert = $getEmail->fetch();
        
        // Création et envoi d'un mail pour prévenir le membre qu'une connexion étrange a eu lieu sur son compte
        $to = $emailToAlert['Email'];
        $subject = "Erreur de sécurité lié à votre compte";
        $from = "noreply@AFPA-Formations.com";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset= utf8' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $msg = "<html><body><h1 style='color: red;'>Une brèche dans la sécuritée de votre compte a été detectée</h1>\n\n
        <p>Une connexion anormale a été detectée depuis un appareil étranger et a été déconnecté de votre compte.</p><p>
        Nous vous recommandons de modifier impérativement votre mot de passe !</p>
        <p>Cet email vous a été envoyé automatiquement, merci de ne pas y répondre.</p>
        <p>En cas de questions, veuillez contacter un Administrateur directement sur le site de 
        <a href='https://dwm-competences.000webhostapp.com'>l'AFPA-Formations</a>.</p>
        </body></html>";
        $header = "From: noreply@AFPA-Formations.com";
        mail($to, $subject, $msg, $headers);
        
        // Redirection vers la page de déconnexion automatique
        header('location: ../deconnexion.php');
        exit();
      
    }

    // Récupération des infos du compte de l'utilisateur si tout va bien
    $connectinfos = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Membres.ID = :id');
    $connectinfos->bindParam(':id', $_SESSION['id']);
    $connectinfos->execute();
    $infos = $connectinfos->fetch();

}

// Conversion d'une date passé en paramètre au format français
function dateConvert($date) {
    
    return (strftime('%d/%m/%Y ', strtotime($date)));
    
}

// Réglage du fuseau horaire et du jeu de caractères
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

// Stockage du mois courant dans une variable qui sera réutilisée plus tard sur différentes pages en tant que parametres (moyennes, auto-evaluation, ...)
$mois = strtoupper(strftime('%B', time()));

?>
