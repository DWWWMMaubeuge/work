<?php if(!isset($_SESSION['id'])) { ?>

  <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
            <li class='nav-item'>
              <a class='nav-link' href='accueil.php'><i class="fas fa-home"></i> Accueil<span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='connexion.php'><i class="fas fa-sign-in-alt"></i> Connexion</a>
            </li>
          </ul>
      </div>
  </nav>

<?php } else { ?>

  <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
            <li class='nav-item'>
            <a class='nav-link' href='accueil.php'><i class="fas fa-home"></i> Accueil<span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='auto-evaluation.php'><i class="fas fa-sliders-h"></i> Auto-evaluation</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='utilisateurs.php'><i class="fas fa-users"></i> Utilisateurs</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Mon compte
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profil.php"><i class="fas fa-user-circle"></i> Mon profil</a>
                <div class="dropdown-divider"></div>
                  <a class='dropdown-item' href='deconnexion.php'><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
              </div>
            </li>
          </ul>
      </div>
  </nav>

<?php } ?>