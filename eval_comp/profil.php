<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php include('config/head.php'); ?>
<?php

setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
$mois = strtoupper(strftime('%B', time()));

$q = $bdd->prepare('SELECT *
FROM Matieres m LEFT JOIN
     (SELECT r.*,
             ROW_NUMBER() OVER (PARTITION BY id_Matiere, id_user ORDER BY TIME_OF_INSERTION DESC) as seqnum
      FROM Resultats r
      WHERE r.ID_USER = :user
      AND MOIS = :mois
     ) r
     ON m.id = r.ID_MATIERE AND
        seqnum = 1
WHERE Active = TRUE AND ID_Formation = :formation;');
$q->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
$q->bindParam(':formation', $infos['ID_FORMATION'], PDO::PARAM_INT);
$q->bindParam(':mois', $mois, PDO::PARAM_STR);
$q->execute();
$count = $q->rowCount();

$resultats = $q->fetchAll();

$q = $bdd->query('SELECT * FROM Formations');
$formations = $q->fetchAll();

?>
<?= myHeader('Profil'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="alert alert-danger my-5 d-none text-center" role="alert" id="erreur"></div> 
    <div class="m-5">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex text-dark flex-column align-items-center text-center">
                                <img src="images/avatars/<?= $infos['Avatar']; ?>" alt="avatar" class="rounded-circle" width="150">
                                <div class="mt-3 col-sm-12">
                                    <h2 id="monPseudo"><?= $infos['Pseudo']?></h2> <i class="fas fa-wrench text-warning editmode" id="Pseudo" onclick="setInfo(this.id, 'monPseudo')" title="Modifier mon pseudo"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="bg-dark list-group list-group-flush">
                            <li class="bg-dark list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <?php if(!empty($infos['Github'])) { ?>
                                    <i class="fab fa-github" title="Lien Github"></i><a class="text-white" id="monGithub" href="https://github.com/<?= $infos['Github']; ?>"><?= $infos['Github']; ?></a><i class="fas fa-wrench text-warning editmode" id="Github" onclick="setInfo(this.id, 'monGithub')" title="Modifier mon pseudo Github"></i>
                                <?php } else { ?>
                                    <i class="fab fa-github" title="Lien Github"></i> <span id="monGithub">Non renseigné !</span><i class="fas fa-wrench text-warning editmode" id="Github" onclick="setInfo(this.id, 'monGithub')" title="Ajouter mon pseudo Github"></i>
                                <?php } ?>
                            </li>
                            <li class="bg-dark list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <?php if(!empty($infos['Site'])) { ?>
                                    <i class="fas fa-link" title="Lien site personnel"></i><a class="text-white" id="monSite" href="<?= $infos['Site']; ?>" target="_blank">Site personnel</a><i class="fas fa-wrench text-warning editmode" id="Site" onclick="setInfo(this.id, 'monSite')" title="Modifier l'adresse de mon site"></i>
                                <?php } else { ?>
                                    <i class="fas fa-link" title="Lien site personnel"></i> <span id="monSite">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Site" onclick="setInfo(this.id, 'monSite')" title="Ajouter l'adresse de mon site"></i>
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
                                        <span id="monPrenom"><?= $infos['Prenom']?></span> <i class="fas fa-wrench text-warning editmode" id="Prenom" onclick="setInfo(this.id, 'monPrenom')" title="Modifier mon prénom"></i>
                                    <?php } else {?>
                                        <span id="monPrenom">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Prenom" onclick="setInfo(this.id, 'monPrenom')" title="Ajouter mon prénom"></i>
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
                                        <span id="monNom"><?= $infos['Nom']?></span> <i class="fas fa-wrench text-warning editmode" id="Nom" onclick="setInfo(this.id, 'monNom')" title="Modifier mon nom"></i>
                                    <?php } else { ?>
                                        <span id="monNom">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Nom" onclick="setInfo(this.id, 'monNom')" title="Ajouter mon nom"></i>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Formation</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php if($infos['ID_FORMATION'] == 0) { ?>
                                    <select class="mx-auto" name="formation" id="Formation" onchange="setFormation(this.value)">
                                        <option value=""></option>
                                        <?php foreach($formations as $formation) { ?>
                                            <option value="<?= $formation['ID_FORMATION']; ?>"><?= $formation['FORMATION']; ?></option>
                                        <?php } ?>
                                    </select>
                                <?php } else { ?>
                                    <span id="maFormation"><?= $infos['FORMATION']; ?></span>
                                <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email <i class="fas fa-question-circle text-warning editmode" title="Votre adresse e-mail est uniquement utilisée à des fins d'administration sur le site et ne sera jamais affiché ailleurs que sur votre profil. Elle sera également toujours caché des visiteurs."></i></h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <span id="monEmail"><?= $infos['Email']; ?></span> <i class="fas fa-wrench text-warning editmode" id="Email" onclick="setInfo(this.id, 'monEmail')" title="Modifier mon adresse e-mail"></i>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Téléphone fixe</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php if(!empty($infos['Fixe'])) { ?>
                                        <span id="monFixe"><?= $infos['Fixe']; ?></span> <i class="fas fa-wrench text-warning editmode" id="Fixe" onclick="setInfo(this.id, 'monFixe')" title="Modifier mon numéro de téléphone fixe"></i>
                                    <?php } else {?>
                                        <span id="monFixe">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Fixe" onclick="setInfo(this.id, 'monFixe')" title="Ajouter mon numéro de téléphone fixe"></i>
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
                                        <span id="monMobile"><?= $infos['Mobile']; ?></span> <i class="fas fa-wrench text-warning editmode" id="Mobile" onclick="setInfo(this.id, 'monMobile')" title="Modifier mon numéro de téléphone mobile"></i>
                                    <?php } else { ?>
                                        <span id="monMobile">Non renseigné !</span> <i class="fas fa-wrench text-warning editmode" id="Mobile" onclick="setInfo(this.id, 'monMobile')" title="Ajouter mon numéro de téléphone mobile"></i>
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
                                        <input type="radio" id="Hidden" value="Hidden" name="Visibility" <?php if($infos['HIDDEN'] == TRUE ) { echo "checked"; } ?> onclick="setOptions(this.id)">
                                        <label for="Hidden">Caché</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="Visible" value="Visible" name="Visibility" <?php if($infos['HIDDEN'] == FALSE ) { echo "checked"; } ?> onclick="setOptions(this.id)">
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
                                    <button class="btn btn-outline-danger" id="MDP" onclick="setPassword(this.id)" title="Modifier mon adresse mot de passe">Modifier mon mot de passe</button>
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
                                            Vous ne vous êtes pas encore évalué pour ce mois ci !
                                        </div>
                                    <?php } else { ?>
                                    <h6 class="d-flex w-100 align-items-center mb-3"><i class="material-icons text-info mr-2">Compétences</i></h6>
                                        <?php foreach($resultats as $resultat) { ?>
                                            <?php if($resultat['Active'] == TRUE) { ?>
                                                <small><?= $resultat['Nom']; ?></small>
                                                <div class="progress mb-3" style="height: 5px">
                                                <div class="progress-bar" role="progressbar" style="width: <?= ($resultat['RESULTAT']); ?>0%" aria-valuemin="0" aria-valuemax="10"></div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                        <div><a href="moyennes.php">Voir mes moyennes</a></div>
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

    function setInfo(id, idelem2) {

        let myElement = document.getElementById(idelem2).outerHTML;
        let baseValue = document.getElementById(idelem2).innerText;
        let element2 = document.getElementById(idelem2);
        let tag = element2.tagName;
        element2.outerHTML = "<input id='"+idelem2+"' type='text' autocomplete='off'>";
        let myInput = document.getElementById(idelem2);
        document.getElementById(idelem2).focus();

        function escapeHTML(text) {

            var map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }

        document.addEventListener('mousedown', function(event) {

            myInput.outerHTML = myElement;
            return false;

        })

        myInput.addEventListener('keyup', function(event) {

            if(event.keyCode === 13) {

                let newvalue = escapeHTML(myInput.value);

                $(document).ready(function() {

                    let post = {};
                    post[id] = newvalue;

                    $.ajax({

                        type: 'POST',
                        url: 'traitements/traitement-profil.php',
                        data: post,
                        dataType: 'text',

                        success: function(data) {

                            if(data != "Operation réussie !") {

                                let errorWindow = document.getElementById('erreur');

                                errorWindow.className = "alert alert-danger my-5 text-center";
                                errorWindow.innerHTML = data;

                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 4500);

                            }

                            if(data == "Operation réussie !") {

                                if(idelem2 == "monSite") {

                                    if(newvalue == "") {

                                        myInput.outerHTML = "<"+tag+" id="+idelem2+">"+"Non renseigné !</"+tag+">";
                                        let errorWindow = document.getElementById('erreur');
                                        errorWindow.className = "alert alert-success my-5 text-center";
                                        errorWindow.innerText = data;
                                        setTimeout(() => {

                                            errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                        }, 4500);
                                        
                                        return;

                                    }

                                    myInput.outerHTML = "<a class='text-white' id="+idelem2+" href='"+newvalue+"' target='_blank' >Site personnel</a>";
                                    let errorWindow = document.getElementById('erreur');
                                    errorWindow.className = "alert alert-success my-5 text-center";
                                    errorWindow.innerText = data;
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 4500);

                                    return;

                                }

                                if(idelem2 == "monGithub") {

                                    if(newvalue == "") {

                                        myInput.outerHTML = "<"+tag+" id="+idelem2+">"+"Non renseigné !</"+tag+">";
                                        let errorWindow = document.getElementById('erreur');
                                        errorWindow.className = "alert alert-success my-5 text-center";
                                        errorWindow.innerText = data;
                                        setTimeout(() => {

                                            errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                        }, 4500);

                                        return;

                                    }

                                    myInput.outerHTML = "<a class='text-white' id="+idelem2+" href='https://github.com/"+newvalue+"' target='_blank' >"+newvalue+"</a>";
                                    let errorWindow = document.getElementById('erreur');
                                    errorWindow.className = "alert alert-success my-5 text-center";
                                    errorWindow.innerText = data;
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 4500);

                                    return;

                                }

                                if(newvalue == "") {

                                    myInput.outerHTML = "<"+tag+" id="+idelem2+">"+"Non renseigné !</"+tag+">";
                                    let errorWindow = document.getElementById('erreur');
                                    errorWindow.className = "alert alert-success my-5 text-center";
                                    errorWindow.innerHTML = data;
                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 4500);

                                } else {

                                    myInput.outerHTML = "<"+tag+" id="+idelem2+">"+newvalue+"</"+tag+">";
                                    let errorWindow = document.getElementById('erreur');
                                    errorWindow.className = "alert alert-success my-5 text-center";
                                    errorWindow.innerHTML = data;

                                    setTimeout(() => {

                                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                    }, 4500);
                                
                                }
                                
                            } else {

                                myInput.outerHTML = myElement;

                            }

                        }

                    });

                });

            } else if(event.keyCode === 27) {

                myInput.outerHTML = myElement;
                return;

            }

        })

    }


    function setOptions(id) {

        $(document).ready(function() {

            let post = id;

            $.ajax({

                type: 'POST',
                url: 'traitements/traitement-profil.php',
                data: post,
                dataType: 'text',

                success: function(data) {

                    let errorWindow = document.getElementById('erreur');
                    errorWindow.className = "alert alert-success my-5 text-center";
                    errorWindow.innerHTML = data;
                    setTimeout(() => {

                        errorWindow.className = "alert alert-danger my-5 text-center d-none";

                    }, 4500);

                }

            });

        });

    }

    function setFormation(id) {

        let post = {};
        let categorie = "Formation";
        post[categorie] = id;

        $.ajax({

            type: 'POST',
            url: 'traitements/traitement-profil.php',
            data: post,
            dataType: 'text',

            success: function(data) {

                window.location.replace('profil.php');

            }

        });


    }

    function setPassword(id) {

        let buttonBase = document.getElementById(id).outerHTML;
        let input = document.getElementById(id);

        input.outerHTML = "<input type='password' id='"+id+"'>";

        let myInput = document.getElementById(id);

        myInput.focus();

        document.addEventListener('mousedown', function(event) {

            myInput.outerHTML = myElement;
            return false;

        })

        myInput.addEventListener('keyup', function(event) {
            
            if(event.keyCode === 13) {

                let newvalue = myInput.value;

                $(document).ready(function() {

                    let post = {};
                    post[id] = newvalue;

                    $.ajax({

                        type: 'POST',
                        url: 'traitements/traitement-profil.php',
                        data: post,
                        dataType: 'text',

                        success: function(data) {

                            if(data != "Operation réussie !") {

                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-danger my-5 text-center";
                                errorWindow.innerHTML = data;

                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 4500);

                            } else {

                                myInput.outerHTML = buttonBase;
                                let errorWindow = document.getElementById('erreur');
                                errorWindow.className = "alert alert-success my-5 text-center";
                                errorWindow.innerHTML = data;

                                setTimeout(() => {

                                    errorWindow.className = "alert alert-danger my-5 text-center d-none";

                                }, 4500);

                            }

                        }

                    });

                });

            } else if(event.keyCode === 27) {

                myInput.outerHTML = buttonBase;
                return;

            }

        })

    }

</script>
<?php require_once('config/footer.php'); ?>