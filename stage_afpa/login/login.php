<?php

require_once('../required/head.php');

?>
<div class="login-page">
  <div class="form">
    <form class="login-form">
        <h3><a class="navbar-brand" href="<?= $_SERVER['PHP_SELF']; ?>" title="logo AFPA">
            <img src="../interface/logoAFPA.png" alt="Logo AFPA">
        </a></h3>
        <input type="text" placeholder="Adresse email"/>
        <input type="password" placeholder="Mot de passe"/>
        <button>Connexion</button>
    </form>
  </div>
</div>
<?php require_once('../required/scripts.php'); ?>