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
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>-->
    <link rel="stylesheet" href="CSS/profil.css">
    <link rel="stylesheet" href="CSS/main.css">
    <script src="./JS/graph.js"></script>
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
                                        <div class="col-md-7 col-7">
                                            <p><?= $user['name']?></p>
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
                                            <p><?= $user['firstname']?></p>
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
                                            <a id="ChangeMdp" href="#">changer mot de passe</a>
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
                <div class="col-md-6">
                    <img src="" alt="" id="graph" style="border-radius:20px;position:fixed;top:20%">
                </div>
            </div>
        </div>
    </div>
</body>
</html>