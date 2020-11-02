<?php if(!isset($_SESSION['id'])) { ?>

  <nav class='navbar navbar-expand-lg navbar-light bg-light'>
      <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
      </button>
      <div class='collapse navbar-collapse' id='navbarNav'>
          <ul class='navbar-nav'>
            <li class='nav-item'>
              <a class='nav-link' href='index.php'>Accueil<span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='connexion.php'>Connexion</a>
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
              <a class='nav-link' href='index.php'>Accueil<span class='sr-only'>(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='auto-evaluation.php'>Auto-Evaluation</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='utilisateurs.php'>Utilisateurs</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='deconnexion.php'>Déconnexion</a>
            </li>
          </ul>
      </div>
  </nav>

<?php } ?>