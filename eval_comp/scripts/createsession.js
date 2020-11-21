$('#addsession').submit(function(e) {
        e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-createsession.php',
        data: {
            'Formation': $('#formation').val(),
            'Debut': $('#debut').val(),
            'Fin': $('#fin').val(),
            'Emplacement': $('#emplacement').val()
        },
        dataType: 'text',
        success: function(data) {
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            // setTimeout( function() {
            //     window.location.replace("accueil.php");
            // }, 5000)
            
        }
    });
});
