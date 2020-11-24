// Envoi du formulaire d'ajout d'une formation lorsque le SuperAdmin appuie sur le bouton d'envoi qui appelle ce script
$('#ajoutformation').submit(function(e) {
    
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        
        type: 'POST',
        url: '../traitements/traitement-ajoutformation.php',
        data: {
            
            'Formation': $('#nomformation').val()
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