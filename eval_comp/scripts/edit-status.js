$('#ajouteradmin').submit(function(e) {
        e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-ajoutadmin.php',
        data: {
            'Admin': $('#selectadmin').val()
        },
        dataType: 'text',
        success: function(data) {
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            $('html, body').animate({
                scrollTop: $("body").offset().top
            }, 0);
            // setTimeout( function() {
            //     window.location.replace("accueil.php");
            // }, 5000)
            
        }
    });
});
