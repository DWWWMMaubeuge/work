// Envoi du formulaire d'ajout d'administration lorsque le SuperAdmin appuie sur le bouton d'envoi qui appelle ce script
$('#ajouteradmin').submit(function(e) {
    
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-ajoutadmin.php',
        // Préparation des données à envoyés => $_POST[variable] = value
        data: {
            'Admin': $('#selectadmin').val()
        },
        // Envoi et réception des données au format html
        dataType: 'html',
        // En cas de succès:
        success: function(data) {
            
            // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
            $('#notification').html(data);
            // Changement de la classe de la div pour la faire apparaitre
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
            $('html, body').animate({
                
                scrollTop: $("body").offset().top
                
            }, 0);
            
            // Décommenter pour ajouter une redirection automatique vers la page d'accueil au bout de 5 secondes
            // setTimeout( function() {
            //     window.location.replace("accueil.php");
            // }, 5000)
            
        }
        
    });
    
});
