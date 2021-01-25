<?php if(!isset($_SESSION['id'])) { ?>
    <!-- Si l'utilisateur n'est pas connecté, cette navbar sera affichée -->
  <nav class='navbar fixed-top navbar-expand-lg navbar-light bg-light' id="navbar">
       <a class="navbar-brand" href="index.php">
          <img src="../images/logoAFPA.png">
        </a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
              <!-- Bouton de connexion -->
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-in-alt"></i> Connexion</a>
              <!-- Dropdown de la navbar -->
              <div class="dropdown-menu justify-content-between" aria-labelledby="navbarDropdown">
                  <!-- Formulaire de connexion -->
                   <li class="px-3 py-2">
                       <form class="form" role="form" method="POST" id="connexion">
                            <div class="form-group">
                                <label class="mr-2" for="connexionemail">Email</label>
                                <input type="email" name="connexionemail" id="connexionemail" class="form-control form-control-sm" placeholder="Adresse e-mail" aria-describedby="helpId" required>
                            </div>
                            <div class="form-group">
                                <label class="mr-2" for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Mot de passe" aria-describedby="helpId" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="form-group text-center">
                                <small><a onclick="forgotPassword()" href="#" data-toggle="modal" data-target="#modalPassword">Mot de passe oublié ?</a></small>
                            </div>
                        </form>
                    </li>
             </div>
          </ul>
      </div>
  </nav>
  <!-- Javascript(ajax) qui gère l'envoi du formulaire de connexion sans rechargement de page -->
  <script src="../scripts/connexion.js"></script>

<?php } else { ?>

<!-- Sinon cette navbar s'affiche -->

<?php

  // Vérification des invitations à entrer dans des sessions de formations que l'utilisateur à reçus
  $checkinvit = $bdd->prepare('SELECT * FROM Invitations WHERE Email = :email');
  $checkinvit->bindParam(':email', $infos['Email'], PDO::PARAM_STR);
  $checkinvit->execute();
  // Comptage du nombre de résultats
  $countinvit = $checkinvit->rowCount();
  
  if($countinvit != 0) {
    
    // Si le nombre de résultat est différent de 0 alors on récupére toutes les infos de l'invitation et on les stocke dans une variable
    $invit = $checkinvit->fetch();
  
      
  }
  
?>
  <!-- Début de l'affichage de la navbar du membre connecté -->
  <nav class='navbar fixed-top navbar-expand-lg navbar-light bg-light' id="navbar">
      <a class="navbar-brand" href="index.php">
          <img src="../images/logoAFPA.png">
        </a>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
            <!-- Liste des liens-->
            <li class='nav-item'>
            <!-- Lien vers l'accueil -->
            <a class='nav-link' href='../index.php'><i class="fas fa-home"></i> Accueil</a>
            </li>
            <?php if($infos['Formateur'] == TRUE || $infos['Administrateur'] == TRUE) { ?>
              <li class='nav-item'>
                <!-- Si l'utilisateur est un Administrateur ou un Formateur, le lien vers l'administration s'affiche -->
                <a class='nav-link' href='../administration/accueiladmin.php'><i class="fas fa-fan fa-spin text-danger"></i> Administration</a>
              </li>
            <?php } ?>
            <?php if($infos['Formateur'] != TRUE && $infos['Administrateur'] != TRUE && $infos['SESSION'] != 0) { ?>
                <!-- Si l'utilisateur n'est ni Administrateur ni administrateur le lien vers l'auto évaluation s'affiche -->
                <li class='nav-item'>
                    <a class='nav-link' href='../auto-evaluation.php'><i class="fas fa-sliders-h"></i> Auto-evaluation</a>
                </li>
            <?php } ?>
            <!-- Liste des utilisateurs-->
            <li class='nav-item'>
              <a class='nav-link' href='../utilisateurs.php'><i class="fas fa-users"></i> Utilisateurs</a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle"></i> Mon compte <?php /* Si le nombre d'invitation est différent de 0 alors on affiche une petite icone d'alerte dans la navbar du membre */ if($countinvit != 0) { echo "<i class='fas fa-exclamation-circle text-warning' title='Vous avez une invitation à rejoindre une formation en attente !'></i>"; } ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!-- Lien vers le profil-->
                <a class="dropdown-item" href="../profil.php"><i class="fas fa-id-card"></i> Mon profil</a>
                <?php if($infos['Formateur'] != TRUE && $infos['Administrateur'] != TRUE && $infos['SESSION'] != 0) { ?>
                    <!-- Si l'utilisateur n'est ni Administrateur ni Formateur on affiche un lien vers les moyennes -->
                    <a class="dropdown-item" href="../moyennes.php"><i class="fas fa-chart-bar"></i> Mes moyennes</a>
                <?php } ?>
                <?php if($countinvit != 0) { ?>
                     <!--Si le nombre d'invitation est différent de 0 on affiche un lien vers une page où l'utilisateur pourra accepter ou décliner son invitation -->
                     <a class="dropdown-item" href="../administration/confirmer-invitation.php"><i class="fas fa-envelope"></i> Invitation en attente</a>
                <?php } ?>
                <div class="dropdown-divider"></div>
                  <!-- Lien pour la déconnexion -->
                  <a class='dropdown-item' href='../deconnexion.php'><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
              </div>
            </li>
          </ul>
      </div>
  </nav>

<?php } ?>