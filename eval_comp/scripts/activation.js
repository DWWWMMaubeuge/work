$('#activation').submit(function(e) {
    e.preventDefault();
$.ajax({
    type: 'POST',
    url: 'traitements/traitement-activation.php',
    data: {
        'Pseudo': $('#pseudo').val(),
        'Password': $('#password').val()
    },
    dataType: 'html',
    success: function(data) {
        $('#notification').html(data);
        $("#notification").removeClass("alert alert-light my-5 d-none text-center").addClass("alert alert-light my-5 text-center");
    }
});
});