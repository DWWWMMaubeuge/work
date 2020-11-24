// fonction de mise à jour des skills dès qu'un range est modifie:
function MAJ_Value( id_skill, formation, value, session, iduser ) {
        
      // Stockage d'une requete http dans une variable
      let xhttp = new XMLHttpRequest();
      
      // Lorsque le status de la requête change:
      xhttp.onreadystatechange = function() {
        
        // Si la requête retourne le status "ok" (requête réussie):
        if (this.readyState == 4 && this.status == 200) {
            
            // Ciblage de la div qui sert à afficher le message d'alerte
            let confirmation = document.getElementById('confirmation');
            
            // Changement de la classe de la div pour la faire apparaitre
            confirmation.className = "alert alert-info my-5 text-center";
            // Insertion du message de confirmation dans la div d'alerte
            confirmation.innerHTML = "Note modifiée avec succès !";
            // Replacement automatique du scroll de l'utilisateur pour le placer sur le haut de la page où se trouve l'alerte
            $('html, body').animate({
                scrollTop: $("body").offset().top
            }, 0);
            
        }
        
      };
      
      // preparation des paramètres de la fonction à passer à la page de traitement php
      xhttp.open("GET", "traitements/traitement-evaluation.php?idSkill="+id_skill+"&formation="+formation+"&valSkill="+value+"&session="+session+"&iduser="+iduser, true);
      // Envoi de la requête à la page de traitement
      xhttp.send();

    }