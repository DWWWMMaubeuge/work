<!--mobile navigation bar start-->
<div class="mobile_nav">
    <div class="nav_bar">
        <img src="https://dwm-competences.000webhostapp.com/images/avatars/21.gif" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
    </div>
    <div class="mobile_nav_items">
        <a onclick="showContent('dashboard', true);" href="#tableaudebord"><i class="fas fa-desktop"></i><span>Tableau de bord</span></a>
        <a onclick="showContent('monespace', true);" href="#monespace"><i class="fas fa-user-circle"></i><span>Espace personnel</span></a>
        <a onclick="showContent('formateur', true);" href="#formateur"><i class="fas fa-chalkboard-teacher"></i><span>Espace formateur</span></a>
        <a onclick="showContent('redacteur', true);" href="#redacteur"><i class="fas fa-pen"></i><span>Espace rédacteur</span></a>
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
    <a onclick="showContent('monespace', false);" href="#monespace"><i class="fas fa-user-circle"></i><span>Espace personnel</span></a>
    <a onclick="showContent('formateur', false);" href="#formateur"><i class="fas fa-chalkboard-teacher"></i><span>Espace formateur</span></a>
    <a onclick="showContent('redacteur', false);" href="#redacteur"><i class="fas fa-pen"></i><span>Espace rédacteur</span></a>
    <a onclick="showContent('parametres', false);" href="#parametres"><i class="fas fa-sliders-h"></i><span>Paramètres</span></a>
</div>
<!--sidebar end-->