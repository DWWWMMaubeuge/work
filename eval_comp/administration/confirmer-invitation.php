<?php 

session_start();

$servername = "localhost";
$username = "id15316558_theevilfox";
$password = "@59199Hergnies";

GLOBAL $bdd;

try {

  $bdd = new PDO("mysql:host=$servername;dbname=id15316558_dwm_maubeuge", $username, $password);
  $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    echo $e->getMessage();
    
}

setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
$mois = strtoupper(strftime('%B', time()));

function checkInvitationParams() {

  GLOBAL $bdd;

  if(!isset($_GET['account']) or empty($_GET['account'])) {

    header('location: ../index.php');
    exit();

  }

  $secure_key = $_GET['account'];

  $q = $bdd->prepare('SELECT EMAIL FROM Invitations WHERE SECURE_KEY = :key');
  $q->bindParam(':key', $secure_key, PDO::PARAM_INT);
  $q->execute();
  $count = $q->rowCount();
  if($count == 0) {

    header('location: ../index.php');
    exit();

  }
    
}

function connectUser($email) {
    
    GLOBAL $bdd;
    
    $sql = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->execute();
    $infos = $sql->fetch();
    
    $_SESSION['id'] = $infos['ID'];
    
}

$q = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Formations ON Options.FORMATION = Formations.ID_FORMATION WHERE Membres.ID = :id');
$q->bindParam(':id', $_SESSION['id']);
$q->execute();
$infos = $q->fetch();

?>
<?php checkInvitationParams(); ?>
<?php include('../config/captcha.php'); ?>
<?php

$q = $bdd->prepare('SELECT * FROM Invitations WHERE SECURE_KEY = :key');
$q->bindParam(':key', $_GET['account'], PDO::PARAM_INT);
$q->execute();

$account = $q->fetch();

connectUser($account['Email']);

$sql = $bdd->prepare('SELECT * FROM Formations WHERE ID_FORMATION = :idformation');
$sql->bindParam(':idformation', $account['FormationID'], PDO::PARAM_INT);
$sql->execute();

$formation = $sql->fetch();

?>
<?php include('../config/head.php'); ?>
<?= myHeader('Invitation'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid banner3 mt-5 p-5" id="top">
    <h1 class="text-center m-5">Accepter l'invitation à rejoindre la formation <?= $formation['FORMATION']; ?> ?</h1>
    <form class="mx-auto" method="POST" id="confirmer-invitation">
        <div class="form-group w-50 mx-auto text-center">
            <div class="m-5">
                <label for="choix">Veuillez choisir une réponse</label>
                <select name="choix" id="choix">
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
            </div>
            <div class="m-5">
                <div>
                    <img class="m-5" src="captcha.png" />
                </div>
                <label for="captcha">Veuillez recopier le code ci-dessus</label>
                <input type="text" class="form-control" name="captcha" id="captcha" autocomplete="off" aria-describedby="captchaHelp" required>
            </div>
            <input type="hidden" value="<?= $account['FormationID']; ?>" name="idformation" id="idformation" readonly required >
            <input type="hidden" value="<?= $account['Email']; ?>" name="email" id="email" readonly required >
            <button id="send-data" class="btn btn-primary mx-auto text-center">Confirmer mon choix</button>
        </div>
    </form>
    <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
<script src="../scripts/confirmer-invitation.js"></script>
<?php require_once('../config/footer.php'); ?>