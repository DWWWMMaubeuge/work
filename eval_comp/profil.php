<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php include('config/head.php'); ?>
<?php

$q = $bdd->prepare('SELECT * FROM Resultats JOIN Matieres ON Resultats.ID_MATIERE = Matieres.id WHERE ID_USER = :user ORDER BY Matieres.id');
$q->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
$q->execute();
$count = $q->rowCount();

$resultats = $q->fetchAll();

?>
<?= myHeader('Profil'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 banner3">
<div class="m-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex text-dark flex-column align-items-center text-center">
                            <img src="images/avatars/<?= $infos['Avatar']; ?>" alt="avatar" class="rounded-circle" width="150">
                            <div class="mt-3 col-sm-12">
                                <h2 id="monPseudo"><?= $infos['Pseudo']?></h2> <i class="fas fa-wrench text-warning editmode" id="Pseudo" onclick="goEdit(this.id)" title="Modifier mon pseudo"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="bg-secondary list-group list-group-flush">
                        <li class="bg-secondary list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <?php if(!empty($infos['Github'])) { ?>
                                <i class="fab fa-github" title="Lien Github"></i><a class="text-white" id="monGithub" href="https://github.com/<?= $infos['Github']; ?>"><?= $infos['Github']; ?></a><i class="fas fa-wrench text-warning editmode" id="Github" onclick="goEdit(this.id)" title="Modifier mon pseudo Github"></i>
                            <?php } else { ?>
                                <i class="fab fa-github" title="Lien Github"></i> <span id="monGithub">Non renseigné !</span><i class="fas fa-wrench text-warning editmode" id="Github" onclick="goEdit(this.id)" title="Ajouter mon pseudo Github"></i>
                            <?php } ?>
                        </li>
                        <li class="bg-secondary list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <?php if(!empty($infos['Site'])) { ?>
                                <i class="fas fa-link" title="Lien site personnel"></i><a class="text-white" id="monSite" href="<?= $infos['Site']; ?>" target="_blank">Site personnel</a><i class="fas fa-wrench text-warning editmode" id="Site" onclick="goEdit(this.id)" title="Modifier l'adresse de mon site"></i>
                            <?php } else { ?>
                                <i class="fas fa-link" title="Lien site personnel"></i> <span id="monSite">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Site" onclick="goEdit(this.id)" title="Ajouter l'adresse de mon site"></i>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body text-dark">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Prénom</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if(!empty($infos['Prenom'])) { ?>
                                    <span id="monPrenom"><?= $infos['Prenom']?></span> <i class="fas fa-wrench text-warning editmode" id="Prenom" onclick="goEdit(this.id)" title="Modifier mon prénom"></i>
                                <?php } else {?>
                                    <span id="monPrenom">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Prenom" onclick="goEdit(this.id)" title="Ajouter mon prénom"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nom</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if(!empty($infos['Nom'])) { ?>
                                    <span id="monNom"><?= $infos['Nom']?></span> <i class="fas fa-wrench text-warning editmode" id="Nom" onclick="goEdit(this.id)" title="Modifier mon nom"></i>
                                <?php } else { ?>
                                    <span id="monNom">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Nom" onclick="goEdit(this.id)" title="Ajouter mon nom"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email <i class="fas fa-question-circle text-warning editmode" title="Votre adresse e-mail est uniquement utilisée à des fins d'administration sur le site et ne sera jamais affiché ailleurs que sur votre profil. Elle sera également toujours caché des visiteurs."></i></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <span id="monEmail"><?= $infos['Email']; ?></span> <i class="fas fa-wrench text-warning editmode" id="Email" onclick="goEdit(this.id)" title="Modifier mon adresse e-mail"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Téléphone fixe</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if(!empty($infos['Fixe'])) { ?>
                                    <span id="monFixe"><?= $infos['Fixe']; ?></span> <i class="fas fa-wrench text-warning editmode" id="Fixe" onclick="goEdit(this.id)" title="Modifier mon numéro de téléphone fixe"></i>
                                <?php } else {?>
                                    <span id="monFixe">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Fixe" onclick="goEdit(this.id)" title="Ajouter mon numéro de téléphone fixe"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Téléphone mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php if(!empty($infos['Mobile'])) { ?>
                                    <span id="monMobile"><?= $infos['Mobile']; ?></span> <i class="fas fa-wrench text-warning editmode" id="Mobile" onclick="goEdit(this.id)" title="Modifier mon numéro de téléphone mobile"></i>
                                <?php } else { ?>
                                    <span id="monMobile">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Mobile" onclick="goEdit(this.id)" title="Ajouter mon numéro de téléphone mobile"></i>
                                <?php } ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Visibilitée du profil <i class="fas fa-question-circle text-warning editmode" title="Si visible est coché votre nom, prenom et vos numéro(s) de téléphone(s) seront visibles par tout le monde si ils sont renseignés. Au contraire, le mode caché cachera ces informations sensibles"></i></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <div>
                                    <input type="radio" id="Hidden" value="Hidden" name="Visibility" <?php if($infos['HIDDEN'] == TRUE ) { echo "checked"; } ?> onclick="setVisibility(this.id)">
                                    <label for="Hidden">Caché</label>
                                </div>
                                <div>
                                    <input type="radio" id="Visible" value="Visible" name="Visibility" <?php if($infos['HIDDEN'] == FALSE ) { echo "checked"; } ?> onclick="setVisibility(this.id)">
                                    <label for="Visible">Visible</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mot de passe</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <button class="btn btn-outline-danger" id="MDP" onclick="goEdit(this.id)" title="Modifier mon adresse mot de passe">Modifier mon mot de passe</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-12 mb-3">
                        <div class="card h-100">
                            <div class="card-body text-dark">
                                <?php if($count == 0) { ?>
                                    <div class="alert alert-danger text-center my-2" role="alert">
                                        Aucune compétences évaluées pour le moment !
                                    </div>
                                <?php } else { ?>
                                <h6 class="d-flex w-100 align-items-center mb-3"><i class="material-icons text-info mr-2">Compétences</i></h6>
                                    <?php foreach($resultats as $resultat) { ?>
                                        <?php if($resultat['Active'] == TRUE) { ?>
                                            <small><?= $resultat['Nom']; ?> : <?= $resultat['RESULTAT']; ?></small>
                                            <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar" role="progressbar" style="width: <?= ($resultat['RESULTAT']); ?>0%" aria-valuemin="0" aria-valuemax="10"></div>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script type="text/javascript">

    function goEdit(id) {

        $(document).ready(function() {

            let userchange = prompt();
            let post = {};
            post[id] = userchange;

            $.ajax({

                type: 'POST',
                url: 'traitements/traitement-profil.php',
                data: post,
                dataType: 'text',

                success: function(data) {

                    alert(data);

                    if(data == "Operation réussie !") {

                        var element = document.getElementById('mon'+id);

                        if(element.id == "monSite" || element.id == "monGithub" ) {

                            element.href = userchange;
                            window.location.replace('profil.php');
                            return;

                        }

                        if(element.id == "monGithub") {

                            element.href = "https://github.com/"+userchange;

                        }

                        if(userchange == "") {

                            element.innerHTML = "Non renseigné !";

                        } else {

                        element.innerHTML = userchange;
                        
                        }
                    }
                }

            });

        });

    }

</script>
<script type="text/javascript">

    function setVisibility(id) {

        $(document).ready(function() {

            let post = id;

            $.ajax({

                type: 'POST',
                url: 'traitements/traitement-profil.php',
                data: post,
                dataType: 'text',

                success: function(data) {

                    alert(data);
                    window.location.replace('profil.php');

                }

            });

        });

    }

</script>
<?php require_once('config/footer.php'); ?>