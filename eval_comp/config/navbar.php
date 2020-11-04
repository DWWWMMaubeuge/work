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
              <a class='nav-link' href='inscription.php'><i class="fas fa-home"></i> Inscription<span class='sr-only'>(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Connexion
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <form class="mx-2 text-center" method="POST" id="connexion">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Adresse e-mail" aria-describedby="helpId">
                </div>
                <div class="form-group">
                  <label for="password">Mot de passe</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" aria-describedby="helpId">
                </div>
                <button class="btn btn-primary m-auto">Login</button>
              </form>
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

<script>

  $('#connexion').submit(function(e) {

      e.preventDefault();

    $.ajax({

        type: 'POST',
        url: 'traitements/traitement-connexion.php',
        data: {
            'email': $('#email').val(),
            'mdp': $('#password').val()
        },
        dataType: 'html',

        success: function(data) {

            alert(data);

            if(data == "Connexion réussie !") {

              window.location.replace('profil.php');

            }

        }
    });
  });

</script>