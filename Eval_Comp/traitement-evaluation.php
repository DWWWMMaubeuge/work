<?php

    include('pdo-connect.php');
    
    $html = htmlspecialchars($_POST['HTML']);
    $css = htmlspecialchars($_POST['CSS']);
    $javascript = htmlspecialchars($_POST['JAVASCRIPT']);
    $php = htmlspecialchars($_POST['PHP']);
    $ajax = htmlspecialchars($_POST['AJAX']);
    $jquery = htmlspecialchars($_POST['JQUERY']);
    $responsive = htmlspecialchars($_POST['RESPONSIVE']);
    $sql = htmlspecialchars($_POST['SQL']);
    $composer = htmlspecialchars($_POST['COMPOSER']);
    $symfony = htmlspecialchars($_POST['SYMFONY']);
    $doctrine = htmlspecialchars($_POST['DOCTRINE']);
    $twig = htmlspecialchars($_POST['TWIG']);
    $agile = htmlspecialchars($_POST['AGILE']);
    $git = htmlspecialchars($_POST['GIT']);
    $python = htmlspecialchars($_POST['PYTHON']);
    $seo = htmlspecialchars($_POST['SEO']);
    $rgpd = htmlspecialchars($_POST['RGPD']);
    $user = htmlspecialchars($_POST['USER']);

    $matieres = array(
        1 => $html,
        $css,
        $javascript,
        $php,
        $ajax,
        $jquery,
        $responsive,
        $sql,
        $composer,
        $symfony,
        $doctrine,
        $twig,
        $agile,
        $git,
        $python,
        $seo,
        $rgpd
    );

    $insert = $bdd->prepare('INSERT INTO Resultats(ID_USER, ID_MATIERE, RESULTAT) VALUES (:user, :matiere, :resultat)');

    foreach($matieres as $key => $value) {
        $insert->bindParam(':user', $user);
        $insert->bindParam(':matiere', $key);
        $insert->bindParam(':resultat', $value);
        $insert->execute();
    }

    $feedback = "Votre auto-évaluation a bien été envoyé ! Vous allez maintenant être redirigé vers l'accueil.";

if(isset($feedback) && !empty($feedback)) {

    echo $feedback;

}


?>