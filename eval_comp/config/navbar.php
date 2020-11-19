<?php if(!isset($_SESSION['id'])) { ?>

  <nav class='navbar fixed-top navbar-expand-lg navbar-light bg-light' id="navbar">
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i> Connexion</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <form class="mx-2 pt-2 form-inline d-flex" method="POST" id="connexion">
                    <div class="form-group d-flex-text-center mx-3">
                      <label class="mr-2" for="connexionemail">Email</label>
                      <input type="email" name="connexionemail" id="connexionemail" class="form-control" placeholder="Adresse e-mail" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group d-flex-text-center mx-3">
                      <label class="mr-2" for="password">Mot de passe</label>
                      <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" aria-describedby="helpId" required>
                      <input type="hidden" name="securepassword" id="securepassword" required>
                    </div>
                    <button class="btn btn-primary m-auto">Login</button>
                  </form>
             </div>
          </ul>
      </div>
  </nav>
  <script src="../scripts/connexion.js"></script>

<?php } else { ?>

<?php

  $sql = $bdd->prepare('SELECT * FROM Invitations WHERE Email = :email');
  $sql->bindParam(':email', $infos['Email'], PDO::PARAM_STR);
  $sql->execute();
  $countinvit = $sql->rowCount();
  
  if($countinvit != 0) {
    $invit = $sql->fetch();
  }
  
?>

  <nav class='navbar fixed-top navbar-expand-lg navbar-light bg-light' id="navbar">
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
            <li class='nav-item'>
            <a class='nav-link' href='../index.php'><i class="fas fa-home"></i> Accueil</a>
            </li>
            <?php if($infos['Admin'] == TRUE || $infos['SuperAdmin'] == TRUE) { ?>
              <li class='nav-item'>
                <a class='nav-link' href='../administration/accueiladmin.php'><i class="fas fa-fan fa-spin text-danger"></i> Administration</a>
              </li>
            <?php } ?>
            <?php if($infos['Admin'] != TRUE && $infos['SuperAdmin'] != TRUE) { ?>
                <li class='nav-item'>
                    <a class='nav-link' href='../auto-evaluation.php'><i class="fas fa-sliders-h"></i> Auto-evaluation</a>
                </li>
            <?php } ?>
            <li class='nav-item'>
              <a class='nav-link' href='../utilisateurs.php'><i class="fas fa-users"></i> Utilisateurs</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle"></i> Mon compte <?php if($countinvit != 0) { echo "<i class='fas fa-exclamation-circle text-warning' title='Vous avez une invitation à rejoindre une formation en attente !'></i>"; } ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../profil.php"><i class="fas fa-id-card"></i> Mon profil</a>
                <?php if($infos['Admin'] != TRUE && $infos['SuperAdmin'] != TRUE) { ?>
                    <a class="dropdown-item" href="../moyennes.php"><i class="fas fa-chart-bar"></i> Mes moyennes</a>
                <?php } ?>
                <?php if($countinvit != 0) { ?>
                     <a class="dropdown-item" href="../administration/confirmer-invitation.php"><i class="fas fa-envelope"></i> Invitation en attente</a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                  <a class='dropdown-item' href='../deconnexion.php'><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
              </div>
            </li>
          </ul>
      </div>
  </nav>

<?php } ?>