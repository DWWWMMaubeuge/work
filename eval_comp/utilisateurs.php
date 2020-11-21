<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php include('config/head.php'); ?>
<?php 

if(isset($_GET['page']) && !empty($_GET['page'])){
    
    $currentPage = (int) strip_tags($_GET['page']);
    
} else {
    
    $currentPage = 1;

    
}

if(isset($_GET['formation'])) {
    
    $type = $_GET['formation'];
    
} else {
    
    $type = "";
    
}

$formations = $bdd->query('SELECT * FROM Formations');

if(!isset($_GET['formation'])) {
    
    $query = $bdd->query('SELECT COUNT(*) AS nb_users FROM Membres');

    $result = $query->fetch();

    $nbUsers = (int) $result['nb_users'];

    $parPage = 5;

    $pages = ceil($nbUsers / $parPage);

    $premier = ($currentPage * $parPage) - $parPage;

    $allusers= $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION ORDER BY Membres.ID ASC LIMIT :premier, :parpage');
    $allusers->bindParam(':premier', $premier, PDO::PARAM_INT);
    $allusers->bindParam(':parpage', $parPage, PDO::PARAM_INT);
    $allusers->execute();
    
} else {
    
    /*$q = $bdd->query('SELECT COUNT(*) AS nb_users FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Sessions.ID_FORMATION = ' . $_GET['formation'] );
    
    $result = $q->fetch();
    
    $nbUsers = (int) $result['nb_users'];

    $parPage = 5;

    $pages = ceil($nbUsers / $parPage);

    $premier = ($currentPage * $parPage) - $parPage;
    
    $allusers = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Sessions.ID_FORMATION = ' . $_GET['formation'] . ' ORDER BY Membres.ID ASC LIMIT :premier, :parpage');
    $allusers->bindParam(':premier', $premier, PDO::PARAM_INT);
    $allusers->bindParam(':parpage', $parPage, PDO::PARAM_INT);
    $allusers->execute();*/
    
    $alluserformations = $bdd->query('SELECT COUNT(*) AS nb_users FROM Membres LEFT JOIN FormationsUtilisateur ON Membres.ID = FormationsUtilisateur.USER LEFT JOIN Sessions ON FormationsUtilisateur.IDENTIFIANT_SESSION = Sessions.ID_SESSION WHERE FormationsUtilisateur.IDENTIFIANT_FORMATION = ' . $_GET['formation']);
    
    $result = $alluserformations->fetch();
    
    $nbUsers = (int) $result['nb_users'];

    $parPage = 5;

    $pages = ceil($nbUsers / $parPage);

    $premier = ($currentPage * $parPage) - $parPage;
    
    $allusers = $bdd->prepare('SELECT * FROM Membres LEFT JOIN FormationsUtilisateur ON Membres.ID = FormationsUtilisateur.USER LEFT JOIN Sessions ON FormationsUtilisateur.IDENTIFIANT_SESSION = Sessions.ID_SESSION WHERE FormationsUtilisateur.IDENTIFIANT_FORMATION = ' . $_GET['formation'] . ' ORDER BY Membres.ID ASC LIMIT :premier, :parpage');
    $allusers->bindParam(':premier', $premier, PDO::PARAM_INT);
    $allusers->bindParam(':parpage', $parPage, PDO::PARAM_INT);
    $allusers->execute();
    
}

?>
<?= myHeader('Utilisateurs'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <h1 class="text-center">Liste des utilisateurs</h1>
    <div class="row my-5">
       <select class="text-center mx-auto" name="type" onChange="selectFormation(this.value)">
        <option value="" <?php if($type == "") { echo "selected"; } ?> readonly>Touts les utilisateurs</option>
        <?php while($formation = $formations->fetch()) { ?>
          <option <?php if($type  == $formation['ID_FORMATION']) { echo "selected"; } ?> value="<?= $formation['ID_FORMATION']; ?>" readonly><?= $formation['FORMATION']; ?></option>
       <?php } ?>
        </select>
    </div>
    <table class="table table-hover table-dark text-center w-100 m-auto">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Avatar</th>
            <th scope="col">Pseudo</th>
            <?php if(isset($_GET['formation'])) { ?>
                <th scope="col">Session</th>
            <?php } ?>
            <?php if($infos['Admin'] == TRUE || $infos['SuperAdmin'] == TRUE) { ?>
                <th scope="col">Moyennes</th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
        <?php while($user = $allusers->fetch()) { ?>
            <tr>
            <td scope="row"><?= $user['ID']; ?></td>
            <td scope="row"><img src="images/avatars/<?= $user['Avatar']; ?>" alt="avatar" class="rounded-circle" width="35"></td>
            <td scope="row"><a class="<?php if($user['Admin'] == 1 || $user['SuperAdmin'] == 1) { ?>text-danger<?php } else { ?>text-info<?php } ?> m-auto" href="utilisateur.php?pseudo=<?= $user['Pseudo']; ?>"><?= $user['Pseudo']; ?></a></td>
            <?php if(isset($_GET['formation'])) { ?>
                <td scope="row">du <?= dateConvert($user['DATE_DEBUT']); ?> au <?= dateConvert($user['DATE_FIN']); ?> - <?= $user['EMPLACEMENT']; ?></td>
            <?php } ?>
            <?php if($infos['Admin'] == TRUE && $user['SuperAdmin'] != TRUE  || $infos['SuperAdmin'] == TRUE && $user['Admin'] != TRUE )  { ?>
                <?php if($infos['Pseudo'] != $user['Pseudo']) { ?>
                    <?php if($user['Admin'] != TRUE && $user['SuperAdmin'] != TRUE) { ?>
                        <td scope="row"><a class="text-white m-auto" href="moyennes.php?pseudo=<?= $user['Pseudo']; ?>"><i class="fas fa-chart-bar"></i></a></td>
                    <?php } else { ?>
                        <td scope="row"></td>
                    <?php } ?>
                <?php } else { ?>
                    <td scope="row"></td>
                <?php } ?>
            <?php } else { ?>
                <td scope="row"></td>
            <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <nav class="my-5">
        <ul class="pagination justify-content-center">
            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                <a href="utilisateurs.php?page=<?= $currentPage - 1 ?><?php if(isset($_GET['formation'])) { echo "&formation=". $_GET['formation'] . "";} ?>" class="page-link">Précédente</a>
            </li>
            <?php for($page = 1; $page <= $pages; $page++): ?>
                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                    <a href="utilisateurs.php?page=<?= $page ?><?php if(isset($_GET['formation'])) { echo "&formation=". $_GET['formation'] . "";} ?>" class="page-link"><?= $page ?></a>
                </li>
            <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                <a href="utilisateurs.php?page=<?= $currentPage + 1 ?><?php if(isset($_GET['formation'])) { echo "&formation=". $_GET['formation'] . "";} ?>" class="page-link">Suivante</a>
            </li>
        </ul>
    </nav>
</div>
<script src="scripts/utilisateurs.js"></script>
<?php require_once('config/footer.php'); ?>