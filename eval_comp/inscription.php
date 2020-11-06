<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsNotLogged(); ?>
<?php include('config/head.php'); ?>
<?= myHeader('Inscription'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 banner3 mt-5">
    <div>
        <form class="mx-5" method="POST" id="inscription">
            <h1>Créer un compte</h1>
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" aria-describedby="prenomHelp" required>
            </div>
            <div class="form-group">
            <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp" required>
            </div>
            <button id="send-data" class="btn btn-primary mt-3">Inscription</button>
        </form>
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>    
    </div>
</div>
<script>
        $('#inscription').submit(function(e) {
            e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'traitements/traitement-inscription.php',
            data: {
                'Pseudo': $('#pseudo').val(),
                'Email': $('#email').val(),
                'MDP': $('#mdp').val()
            },
            dataType: 'html',
            success: function(data) {
                $('#notification').html(data);
                $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            }
        });
        });
</script>
<?php require_once('config/footer.php'); ?>