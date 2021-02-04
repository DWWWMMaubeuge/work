<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="test_interface.css">
    <script src="test_interface.js"></script>
    <title>AFPA: Formation professionnelle</title>
</head>
<body>
  <input type="checkbox" id="check">
  <!--header area start-->
  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn" title="Ouvrir/fermer la sidebar"></i>
    </label>
    <div class="left_area">
    <h3><a class="navbar-brand" href="<?= $_SERVER['PHP_SELF']; ?>" title="photo de profil">
      <img src="logoAFPA.png" alt="Logo AFPA">
    </a></h3>
    </div>
    <div class="right_area">
      <a href="#" class="logout_btn">Deconnexion</a>
    </div>
  </header>
  <!--header area end-->
  <!--mobile navigation bar start-->
  <div class="mobile_nav">
    <div class="nav_bar">
      <img src="https://dwm-competences.000webhostapp.com/images/avatars/21.gif" class="mobile_profile_image" alt="">
      <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
      <a onclick="showContent('dashboard', true);" href="#tableaudebord"><i class="fas fa-desktop"></i><span>Tableau de bord</span></a>
      <a onclick="showContent('nouveauquestionnaire', true);" href="#nouveauquestionnaire"><i class="fas fa-plus"></i><span>Nouveau questionnaire</span></a>
      <a onclick="showContent('mesquestionnaires', true);" href="#mesquestionnaires"><i class="fas fa-chart-pie"></i><span>Mes questionnaires</span></a>
      <a onclick="showContent('stats', true);" href="#stats"><i class="fas fa-poll"></i><span>Statistiques</span></a>
      <a onclick="showContent('parametres', true);" href="#parametres"><i class="fas fa-sliders-h"></i><span>Paramètres</span></a>
    </div>
  </div>
  <!--mobile navigation bar end-->
  <!--sidebar start-->
  <div class="sidebar">
    <div class="profile_info">
      <img src="https://dwm-competences.000webhostapp.com/images/avatars/21.gif" class="profile_image" alt="Photo de profil">
      <h4>Steven</h4>
    </div>
    <a onclick="showContent('dashboard', false);" href="#tableaudebord"><i class="fas fa-desktop"></i><span>Tableau de bord</span></a>
    <a onclick="showContent('nouveauquestionnaire', false);" href="#nouveauquestionnaire"><i class="fas fa-plus"></i><span>Nouveau questionnaire</span></a>
    <a onclick="showContent('mesquestionnaires', false);" href="#mesquestionnaires"><i class="fas fa-chart-pie"></i><span>Mes questionnaires</span></a>
    <a onclick="showContent('stats', false);" href="#stats"><i class="fas fa-poll"></i><span>Statistiques</span></a>
    <a onclick="showContent('parametres', false);" href="#parametres"><i class="fas fa-sliders-h"></i><span>Paramètres</span></a>
  </div>
  <!--sidebar end-->
  <!-- Content window ( with example home content ) -->
  <div class="content" id="content">
    <div class="card">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
    <div class="card">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
    <div class="card">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
    <div class="card">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </div>
  </div>
  <!-- Content window end -->
  <script src="test_ajax.js"></script>
  <noscript>Votre navigateur ne supporte pas Javascript !</noscript>
</body>
</html>