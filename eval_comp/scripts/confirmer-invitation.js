// Envoi du formulaire d'activation de compte lorsque l'utilisateur appuie sur le bouton d'envoi qui appelle ce script
$('#confirmer-invitation').submit(function(e) {
    
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-invitations.php',
        // Préparation des données à envoyés => $_POST[variable] = value
        data: {
            'Email': $('#email').val(),
            'Idformation': $('#idformation').val(),
            'Idsession': $('#idsession').val(),
            'Confirmation': $('#choix').val(),
            'Captcha': $('#captcha').val()
        },
        // Envoi et réception des données au format html
        dataType: 'html',
        // En cas de succès:
        success: function(data) {
            
            // Si la page de traitement retourne le message de confirmation:
            if(data == "Votre choix a bien été pris en compte ! Vous allez être redirigé vers votre profil") {
                
                // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                $('#notification').html(data);
                // Changement de la classe de la div pour la faire apparaitre
                $("#notification").removeClass("alert alert-light my-5 d-none text-center").addClass("alert alert-light my-5 text-center");
                // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                $('html, body').animate({
                    
                    scrollTop: $("body").offset().top
                    
                }, 0);
                
                setTimeout(() => {
                    
                    // Redirection de l'utilisateur vers le profil de son compte créé au bout de 2,5 secondes.
                    window.location.replace('../profil.php');
    
                }, 2500);
                
            // Sinon c'est que la page retourne un message d'erreur:
            } else {
                
                // Insertion du message d'erreur de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
                $('#notification').html(data);
                // Changement de la classe de la div pour la faire apparaitre
                $("#notification").removeClass("alert alert-light my-5 d-none text-center").addClass("alert alert-light my-5 text-center");
                // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
                $('html, body').animate({
                    
                    scrollTop: $("body").offset().top
                    
                }, 0);
                
            }
            
        }
        
    });
    
});