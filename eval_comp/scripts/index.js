function showDescription() {

    let content = document.getElementById('learnmore');
    content.className = "container-fluid banner2";
    $('html, body').animate({
        scrollTop: $("#description").offset().top
    }, 2500);

}

function closeDescription() {

    let content = document.getElementById('learnmore');
    $('html, body').animate({
        scrollTop: $("#top").offset().top
    }, 2500);
    setTimeout(function(){ content.className = "container-fluid banner2 d-none"; }, 2500);

}