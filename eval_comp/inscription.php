<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php userIsAdmin(); ?>
<?php include('config/head.php'); ?>
<?= myHeader('Inscription'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 banner3 mt-5">
    <h1 class="text-center m-5">Envoyer une invitation</h1>
    <form class="mx-auto" method="POST" id="inscription">
        <div class="form-group w-50 mx-auto text-center">
            <label for="email">Email</label>
            <input type="email" placeholder="example@example.com" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
            <button id="send-data" class="btn btn-primary mx-auto my-5 text-center">Inscription</button>
        </div>
    </form>
    <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
</div>
<script src="scripts/inscription.js"></script>
<?php require_once('config/footer.php'); ?>