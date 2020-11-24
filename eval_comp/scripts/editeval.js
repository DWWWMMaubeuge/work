// Envoi du formulaire d'activation d'une compétence lorsque l'admin appuie sur le bouton d'envoi qui appelle ce script
$('#activerComp').submit(function(e) {
    
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editcomps.php',
        // Préparation des données à envoyés => $_POST[variable] = value
        data: {
            'ON': $('#enableComp').val(),
            'SESSION': $('#session').val()
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

// Envoi du formulaire de désactivation d'une compétence lorsque l'admin appuie sur le bouton d'envoi qui appelle ce script
$('#desactiverComp').submit(function(e) {
    
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editcomps.php',
        // Préparation des données à envoyés => $_POST[variable] = value
        data: {
            'OFF': $('#disableComp').val(),
            'SESSION': $('#session').val()
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

// Envoi du formulaire d'ajout d'une compétence lorsque l'admin appuie sur le bouton d'envoi qui appelle ce script
$('#ajoutComp').submit(function(e) {
    
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editcomps.php',
        // Préparation des données à envoyés => $_POST[variable] = value
        data: {
            'ADD': $('#add').val(),
            'ACTIVE': $('#is-activated').val(),
            'FORMATION': $('#formation').val(),
            'SESSION': $('#session').val()
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

// Envoi du formulaire de modification des dates d'une session lorsque l'admin appuie sur le bouton d'envoi qui appelle ce script
$('#dates').submit(function(e) {
    
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editcomps.php',
        // Préparation des données à envoyés => $_POST[variable] = value
        data: {
            'DEBUT': $('#datedebut').val(),
            'FIN': $('#datefin').val(),
            'FORMATION': $('#formation').val(),
            'SESSION': $('#session').val()
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
