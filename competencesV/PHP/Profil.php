<?php
include 'SQLRecoverResult.php';
include 'SQLProfil.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/profil.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="./JS/graph.js"></script>
<!--    <script src="./JS/changePwd.js"></script>-->
    <script src="./JS/changeProfil.js"></script>
</head>
<body>
    <div class="container my-5">
        <div class="team-single">
            <div class="row background text-white">
                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom">
                    <div class="team-single-img mt-3" style="border-radius:5px">
                        <img src="https://www.placecage.com/500/500" style="border-radius:15px" alt="">
                    </div>
                    <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center my-1 bg-transparent">
                        <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600 text-white"><?= $formation['name'] ?></h4>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30"><?= ucwords($_SESSION['prenom']." ".$_SESSION['nom'])?></h4>
                        <div class="contact-info-section margin-40px-tb">
                            <ul class="list-style9 no-margin">
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-id-card-alt"></i>
                                            <strong class="margin-10px-left">Nom</strong>
                                        </div>
                                        <div  class="col-md-7 col-7">
                                            <a id='changeName' class="underline text-white" ><?= $user['name']?></a>
                                            <div id="hideName">
                                                <input type="text" id="newName" name="newName" placeholder="entrez votre nouveau nom">
                                                <input type="submit" class='btn btn-primary' name="submitNewName" id="submitNewName" value="Confirmez">
                                                <div id="successName" class="alert alert-success mt-2">Nom changé avec succés</div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-id-card-alt"></i>
                                            <strong class="margin-10px-left">Prenom</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <a id="changeFirstName" class="underline text-white"><?= $user['firstname']?></a>
                                            <div id="hideFirstName">
                                                <input type="text" id="newFirstName" name="newFirstName" placeholder="entrez votre nouveau prenom">
                                                <input type="submit" class='btn btn-primary' name="submitNewFirstName" id="submitNewFirstName" value="Confirmez">
                                                <div id="successFirstName" class="alert alert-success mt-2">Prénom changé avec succés</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-at"></i>
                                            <strong class="margin-10px-left">email</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><?= $user['email']?></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-key"></i>
                                            <strong class="margin-10px-left">Mot de passe</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <a id="changeMdp" class="underline text-white">Changer mot de passe</a>
                                            <div id="hidePwd">
                                                <input type="password" id="newPwd" name="newPwd" placeholder="entrez votre nouveau mot de passe">
                                                <input type="submit" name="submitNewPwd" class='btn btn-primary'  id="submitNewPwd" value="Confirmez">
                                                <div id="successPwd" class="alert alert-success mt-2">Mot de passe changé avec succés</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="font-size24 sm-font-size22 xs-font-size20">Compétences</h5>
                    <div class="sm-no-margin">
                        <?= compProfil($array); ?>
                    </div>
                </div>
                <div class="col-md-6" id="graphContainer">
                    <img src="" alt="" id="graph" style="border-radius:20px;position:fixed;top:25%;">
                </div>
            </div>
        </div>
    </div>
</body>
</html>