<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php include('../config/head.php'); ?>
<?php

?>
<?php include('../config/captcha.php'); ?>
<?php

$selectinvitation = $bdd->prepare('SELECT * FROM Invitations LEFT JOIN Formations ON Invitations.FormationID = Formations.ID_FORMATION LEFT JOIN Sessions ON Invitations.Session_ID = Sessions.ID_SESSION WHERE Email = :email');
$selectinvitation->bindParam(':email', $infos['Email'], PDO::PARAM_STR);
$selectinvitation->execute();

$countinvitation = $selectinvitation->rowCount();

if($countinvitation != 1) {
    
    header('Location: profil.php');
    exit();
    
}

$invitation = $selectinvitation->fetch();


?>
<?= myHeader('Invitation'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid banner3 mt-5 p-5" id="top">
    <h1 class="text-center m-5">Vous avez été invité à rejoindre la session du <?= dateConvert($invitation['DATE_DEBUT']); ?> au <?= dateConvert($invitation['DATE_FIN']); ?> de la formation <?= $invitation['FORMATION']; ?></h1>
    <h2 class="text-center m-5">Cette formation se déroule à <?= $invitation['EMPLACEMENT']; ?></h2>
    <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
    <div class="container bg-dark my-5 p-5 opacity-4">
        <form class="mx-auto" method="POST" id="confirmer-invitation">
            <div class="form-group w-50 mx-auto text-center">
                <div class="m-3">
                    <label for="choix">Accepter de participer à cette session ?</label>
                    <select name="choix" id="choix">
                        <option value="Oui">Oui</option>
                        <option value="Non">Non</option>
                    </select>
                </div>
                <div class="m-3">
                    <div>
                        <img class="m-5" src="captcha.png" />
                    </div>
                    <label for="captcha">Veuillez recopier le code ci-dessus</label>
                    <input type="text" class="form-control" name="captcha" id="captcha" autocomplete="off" aria-describedby="captchaHelp" required>
                </div>
                <input type="hidden" value="<?= $invitation['FormationID']; ?>" name="idformation" id="idformation" readonly required >
                <input type="hidden" value="<?= $invitation['ID_SESSION']; ?>" name="idsession" id="idsession" readonly required>
                <input type="hidden" value="<?= $infos['Email']; ?>" name="email" id="email" readonly required >
                <button id="send-data" class="btn btn-primary mx-auto text-center">Confirmer mon choix</button>
            </div>
        </form>
    </div>
<script src="../scripts/confirmer-invitation.js"></script>
<?php require_once('../config/footer.php'); ?>