// Lorsque l'utilisateur selectionne une session dans la liste:
function getMoyennes(id, value) {
    
    // Envoi du formulaire qui contient le select des sessions
    $('#form-moyennes').submit();
    // Annulation de l'action de base du formulaire
    e.preventDefault();
    // Création d'un tableau POST qui contiendra les données à envoyés à la page de traitement
    let post = {};
    // Assignation du nom de la variable POST avec l'id de l'input et assignation de sa valeur avec la valeur de l'input envoyé
    post[id] = value;
    // Envoi des données via Ajax sur une page de traitement php
    $.ajax({
        type: 'POST',
        url: '../moyennes.php',
        // Préparation des données à envoyés
        data: post,
        
        dataType: 'html',
        // En cas de succès:
        success: function(data) {
            
            // Aucune action requise de la part de javascript en cas de succès 
            
        }
        
    });
    
}