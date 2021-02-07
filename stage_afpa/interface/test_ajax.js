function showContent(category, isResponsive) {
    
    // Si la page est prête à executer du code javascript:
    $(document).ready(function() {

        // Création d'une variable qui cible la fenetre qui affiche le contenu des catégories
        let contentWindow = document.getElementById('content');
        // Envoie d'une requête ajax qui recevra en réponse le contenu de la catégorie cliqué
        $.ajax({

            type: 'POST',
            url: 'test_ajax.php',
            data: category,
            dataType: 'html',
            success: function(data) {

                if(isResponsive == false) {

                    contentWindow.style.opacity = 0;

                    setTimeout(function() {

                        contentWindow.innerHTML = data;
                        contentWindow.style.opacity = 1;

                    }, 500)

                }

                if(isResponsive == true) {

                    contentWindow.innerHTML = data;
                    $('.mobile_nav_items').toggleClass('active');

                }

            }

        });

    });

}