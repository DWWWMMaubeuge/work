// Recuperation des sessions selon la formation qui est selectionné par le SuperAdmin
function getUserInfos() {
    
    // Ciblage du selecteur de membre
    let selectMembre = document.getElementById("membre");
    // Ciblage de la div qui contient les selecteur de status
    let divResponse = document.getElementById("ajaxResponse");
    
    // Si un pseudo a été selectionné dans le selecteur de membre:
    if(selectMembre.value != "") {
        
        // Envoi des données via Ajax sur une page de traitement php
        $.ajax({
            type: 'POST',
            url: '../traitements/traitement-editstatus.php',
            // Préparation des données à envoyés => $_POST[variable] = value
            data: {
                'Pseudo': $('#membre').val()
            },
            // Envoi et réception des données au format html
            dataType: 'html',
            // En cas de succès:
            success: function(data) {
                // Changement de la classe de la div qui contient le selecteur de session pour la faire apparaitre
                divResponse.className = "form-group my-5";
                // Insertion des sessions retournées selon la formation qui a été selectionnée
                divResponse.innerHTML = data;
            }
        });
    
    // Si l'utilisateur a selectionné l'option vide par défaut:
    } else {
        
        // Changement de la classe de la div qui contient le selecteur de session pour la faire disparaitre
        divResponse.className = "form-group my-5 d-none";
        // Remise à zéro de la div response
        divResponse.innerHTML = "";
        
    }
    
}

// Envoi du formulaire d'ajout d'administration lorsque le SuperAdmin appuie sur le bouton d'envoi qui appelle ce script
$('#editstatus').submit(function(e) {
    
    // Ciblage du selecteur de membre
    let selectMembre = document.getElementById("membre");
    // Ciblage de la div qui contient les selecteur de status
    let divResponse = document.getElementById("ajaxResponse");
    // Ciblage de la div d'alerte
    let alertWindow = document.getElementById('notification');
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editstatus.php',
        // Préparation des données à envoyés => $_POST[variable] = value
        data: {
            'Membre': $('#membre').val(),
            'Administrateur': $('#superAdmin').val(),
            'Formateur': $('#admin').val()
        },
        // Envoi et réception des données au format html
        dataType: 'html',
        // En cas de succès:
        success: function(data) {
            
            // Insertion de la réponse de la page de traitement dans une div qui sert de message d'alerte à l'utilisateur
            $('#notification').html(data);
            // Changement de la classe de la div pour la faire apparaitre
            alertWindow.className = "alert alert-light my-5 text-center";
            // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
            $('html, body').animate({
                
                scrollTop: $("body").offset().top
                
            }, 0);
            // Changement de la classe de la div d'alerte au bout de 4.5 secondes pour la faire disparaitre
            setTimeout(() => {
                
                 alertWindow.className = "alert alert-info my-5 text-center d-none";
                 selectMembre.value = "";
                 divResponse.innerHTML = "";

            }, 4500);
            
            // Décommenter pour ajouter une redirection automatique vers la page d'accueil au bout de 5 secondes
            // setTimeout( function() {
            //     window.location.replace("accueil.php");
            // }, 5000)
            
        }
        
    });
    
});