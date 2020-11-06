<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php include('config/head.php'); ?>
<?php 
 
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = (int) strip_tags($_GET['page']);
}else{
    $currentPage = 1;
}

$query = $bdd->query('SELECT COUNT(*) AS nb_users FROM Membres');

$result = $query->fetch();

$nbUsers = (int) $result['nb_users'];

$parPage = 5;

$pages = ceil($nbUsers / $parPage);

$premier = ($currentPage * $parPage) - $parPage;

$q = $bdd->prepare('SELECT * FROM Membres ORDER BY ID ASC LIMIT :premier, :parpage');
$q->bindParam(':premier', $premier, PDO::PARAM_INT);
$q->bindParam(':parpage', $parPage, PDO::PARAM_INT);
$q->execute();

$users = $q->fetchAll(PDO::FETCH_ASSOC);

?>
<?= myHeader('Utilisateur'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <h1 class="text-center my-5">Liste des utilisateurs</h1>
    <table class="table table-hover table-dark w-50 m-auto">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Avatar</th>
            <th scope="col">Pseudo</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($users as $user) { ?>
            <tr>
            <td scope="row"><?= $user['ID']; ?></td>
            <td scope="row"><img src="images/avatars/<?= $infos['Avatar']; ?>" alt="avatar" class="rounded-circle" width="35"></td>
            <td scope="row"><a class="text-white m-auto" href="utilisateur.php?pseudo=<?= $user['Pseudo']; ?>"><?= $user['Pseudo']; ?></a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <nav class="my-5">
        <ul class="pagination justify-content-center">
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
    <?php require_once('config/footer.php'); ?>