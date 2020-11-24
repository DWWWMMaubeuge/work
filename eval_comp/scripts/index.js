// Losque l'utilisateur appuie sur le bouton "en savoir plus" sur la page d'accueil:
function showDescription() {
    
    // Ciblage du contenu de la div "learnmore"
    let content = document.getElementById('learnmore');
    // Changement de la classe de la div "learnmore" pour la faire apparaitre
    content.className = "container-fluid banner2";
    // Scroll automatique, en 2.5 secondes, de l'utilisateur vers le contenu qui est maintenant affichée
    $('html, body').animate({
        
        scrollTop: $("#description").offset().top
        
    }, 2500);

}

function closeDescription() {
    // Ciblage du contenu de la div "learnmore"
    let content = document.getElementById('learnmore');
    // Scroll automatique, en 2.5 secondes, de l'utilisateur vers le haut de la page
    $('html, body').animate({
        
        scrollTop: $("#top").offset().top
        
    }, 2500);
    
    // Changement de la classe de la div "learnmore" au bouts de 2.5 secondes pour la faire disparaitre
    setTimeout(function(){ content.className = "container-fluid banner2 d-none"; }, 2500);

}