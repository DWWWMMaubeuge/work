// Envoi du formulaire d'ajout d'une formation lorsque le SuperAdmin appuie sur le bouton d'envoi qui appelle ce script
$('#ajoutformation').submit(function(e) {
    
    //Ciblage de la div d'alertes
    let alertWindow = document.getElementById('notification');
    // Ciblage de l'input du nom de la formation à ajouter
    let myInput = document.getElementById('nomformation');
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
            alertWindow.innerHTML = data;
            // Changement de la classe de la div pour la faire apparaitre
            alertWindow.className = "alert alert-light my-5 text-center";
            // Raffraichissement du select de suppression de formations
            $("#test").load("../config/getformations.php");
            // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
            $('html, body').animate({
                
                scrollTop: $("body").offset().top
                
            }, 0);
            
            //
            
            setTimeout(() => {
                
                alertWindow.innerHTML = "";
                alertWindow.className = "alert alert-light my-5 text-center d-none";
                myInput.value = "";

            }, 4500);
        }
        
    });
    
});