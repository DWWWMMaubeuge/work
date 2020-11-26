// Recuperation des sessions selon la formation qui est selectionné par le SuperAdmin
function getSessions() {
    
    // Ciblage de la div qui contient le selecteur de session
    let mydiv = document.getElementById("selectsession");
    // Ciblage du selecteur de session en lui-même
    let selectsession = document.getElementById("idsession");
    
    // Si une formation a été selectionné dans le selecteur de formation:
    if($('#idformation').val() != "") {
        
        // Envoi des données via Ajax sur une page de traitement php
        $.ajax({
            type: 'POST',
            url: '../config/getsessions.php',
            // Préparation des données à envoyés => $_POST[variable] = value
            data: {
                'idformation': $('#idformation').val()
            },
            // Envoi et réception des données au format html
            dataType: 'html',
            // En cas de succès:
            success: function(data) {
                // Changement de la classe de la div qui contient le selecteur de session pour la faire apparaitre
                mydiv.className = "form-group my-5";
                // Insertion des sessions retournées selon la formation qui a été selectionnée
                selectsession.outerHTML = data;
            }
        });
    
    // Si l'utilisateur a selectionné l'option vide par défaut:
    } else {
        
        // Changement de la classe de la div qui contient le selecteur de session pour la faire disparaitre
        mydiv.className = "form-group my-5 d-none";
        // Changement de l'html du select pour supprimer toutes les options qui avait été insérée.
        selectsession.outerHTML = "<select name='idsession' id='idsession'><option value=''></option></select>";
        
    }
    
}

// Envoi du formulaire d'invitations lorsque le SuperAdmin appuie sur le bouton d'envoi qui appelle ce script
$('#ajoututilisateurs').submit(function(e) {
    
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-ajoututilisateurs.php',
        // Préparation des données à envoyés => $_POST[variable] = value
        data: {
            'Emails': $('#emails').val(),
            'Formation': $('#idformation').val(),
            'Session': $('#idsession').val(),
            'Role': $('#role').val()
        },
        // Envoi et réception des données au format html
        dataType: 'html',
        // En cas de succès:
        success: function(data) {
            
            // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
            $('#notification').html(data);
            // Changement de la classe de la div pour la faire apparaitre
            $("#notification").removeClass("alert alert-light my-5 d-none text-center").addClass("alert alert-light my-5 text-center");
             // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
            $('html, body').animate({
                
                scrollTop: $("body").offset().top
                
            }, 0);
            
        }
        
    });
    
});