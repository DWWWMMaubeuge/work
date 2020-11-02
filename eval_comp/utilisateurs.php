<?php require_once('pdo-connect.php'); ?>
<?php require_once('verifications.php'); ?>
<?php userIsLogged(); ?>
<?php 
 
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

$query = $bdd->query('SELECT COUNT(*) AS nb_users FROM Membres');

$result = $query->fetch();

$nbUsers = (int) $result['nb_users'];

$parPage = 10;

$pages = ceil($nbUsers / $parPage);

$premier = ($currentPage * $parPage) - $parPage;

$q = $bdd->prepare('SELECT * FROM Membres ORDER BY ID ASC LIMIT :premier, :parpage');
$q->bindParam(':premier', $premier, PDO::PARAM_INT);
$q->bindParam(':parpage', $parPage, PDO::PARAM_INT);
$q->execute();

$users = $q->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="https://kit.fontawesome.com/747acc35b5.js" crossorigin="anonymous"></script>
    <title>Formation DWM / Inscription </title>
</head>
<body class="bg-secondary text-white">
    <?php require_once('navbar.php'); ?>
    <div class="container my-5">
        <h1 class="text-center my-5">Liste des utilisateurs</h1>
        <table class="table table-hover table-dark mx-auto">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user) { ?>
                <tr>
                <td scope="row"><?= $user['ID']; ?></td>
                <td scope="row"><?= $user['Prenom']; ?></td>
                <td scope="row"><?= $user['Nom']; ?></td>
                <td scope="row"><?= $user['Email']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <nav class="my-5">
            <ul class="pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="utilisateurs.php?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>
                <?php for($page = 1; $page <= $pages; $page++): ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="utilisateurs.php?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="utilisateurs.php?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>
    </div>
    <?php require_once('footer.php'); ?>