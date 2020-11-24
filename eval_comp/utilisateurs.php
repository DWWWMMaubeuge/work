<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); // Vérification si l'utilisateur est connecté ?>
<?php include('config/head.php'); ?>
<?php 

// Si un numéro de page n'est fourni en paramètre dans l'url: 
if(isset($_GET['page']) && !empty($_GET['page'])){
    
    // Stockage de la page courante dans une variable
    $currentPage = (int) strip_tags($_GET['page']);

// Sinon:
} else {
    
    // Création de la variable $currentPage est assignation de celle-ci à 1
    $currentPage = 1;

    
}

// Si l'id d'une formation est passé en paramètre:
if(isset($_GET['formation'])) {
    
    // Stockage de l'id de la formation dans la $variable type
    $type = $_GET['formation'];
    
} else {
    
    // Sinon $type sera vide
    $type = "";
    
}

// Selection des données de toutes les formations existantes dans la base de données
$formations = $bdd->query('SELECT * FROM Formations');

// Si aucun id de formation n'est fourni en paramètre:
if(!isset($_GET['formation'])) {
    
    // Comptage du total du nombre d'utilisateur enregistré dans la base de données
    $countmembers = $bdd->query('SELECT COUNT(*) AS nb_users FROM Membres');
    
    // Récupération du nombre total et stockage dans une variable $result
    $result = $countmembers->fetch();
    
    // Stockage du nombre d'utilisateurs dans une variable $nbUsers
    $nbUsers = (int) $result['nb_users'];
    
    // Définission du nombre d'utilisateur par page
    $parPage = 5;
    
    // Calcul du nombre de pages
    $pages = ceil($nbUsers / $parPage);
    
    // Definission du premier utilisateur à afficher
    $premier = ($currentPage * $parPage) - $parPage;

    // Selection de toutes les données des utilisateurs dans la base de données
    $allusers= $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION ORDER BY Membres.ID ASC LIMIT :premier, :parpage');
    $allusers->bindParam(':premier', $premier, PDO::PARAM_INT);
    $allusers->bindParam(':parpage', $parPage, PDO::PARAM_INT);
    $allusers->execute();

// Si une id de formation est fourni en paramètre:
} else {
    
    // Comptage du total du nombre d'utilisateur enregistré dans la base de données et qui font partie de la formation selectionnée
    $alluserformations = $bdd->query('SELECT COUNT(*) AS nb_users FROM Membres LEFT JOIN FormationsUtilisateur ON Membres.ID = FormationsUtilisateur.USER LEFT JOIN Sessions ON FormationsUtilisateur.IDENTIFIANT_SESSION = Sessions.ID_SESSION WHERE FormationsUtilisateur.IDENTIFIANT_FORMATION = ' . $_GET['formation']);
    
    // Recuperation du nombre total d'utilisateur dans la formation
    $result = $alluserformations->fetch();
    
    // Stockage du nombre d'utilisateurs dans une variable $nbUsers
    $nbUsers = (int) $result['nb_users'];
    
    // Définission du nombre d'utilisateur par page
    $parPage = 5;
    
    // Calcul du nombre de pages
    $pages = ceil($nbUsers / $parPage);
    
    // Definission du premier utilisateur à afficher
    $premier = ($currentPage * $parPage) - $parPage;
    
    // Selection de toutes les données des utilisateurs dans la base de données et qui font partie de la formation selectionnée
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
    <!-- Selecteur de formation -->
    <div class="row my-5">
       <select class="text-center mx-auto" name="type" onChange="selectFormation(this.value)">
        <option value="" <?php if($type == "") { echo "selected"; } ?> readonly>Touts les utilisateurs</option>
        <?php while($formation = $formations->fetch()) { ?>
          <option <?php if($type  == $formation['ID_FORMATION']) { echo "selected"; } ?> value="<?= $formation['ID_FORMATION']; ?>" readonly><?= $formation['FORMATION']; ?></option>
       <?php } ?>
        </select>
    </div>
    <!-- Tableau des utilisateurs -->
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
    <!-- Pagination -->
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
<!-- Lien vers le script de la page utilisateurs -->
<script src="scripts/utilisateurs.js"></script>
<?php require_once('config/footer.php'); ?>