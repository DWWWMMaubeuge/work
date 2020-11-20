$('#ajoututilisateurs').submit(function(e) {
    e.preventDefault();
$.ajax({
    type: 'POST',
    url: '../traitements/traitement-ajoututilisateurs.php',
    data: {
        'Emails': $('#emails').val(),
        'Formation': $('#idformation').val(),
        'Session': $('#idsession').val(),
        'Role': $('#role').val()
    },
    dataType: 'html',
    success: function(data) {
        $('#notification').html(data);
        $("#notification").removeClass("alert alert-light my-5 d-none text-center").addClass("alert alert-light my-5 text-center");
    }
});
});