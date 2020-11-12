$('#activation').submit(function(e) {
    e.preventDefault();
$.ajax({
    type: 'POST',
    url: '../traitements/traitement-activation.php',
    data: {
        'Pseudo': $('#pseudo').val(),
        'Password': $('#mdp').val(),
        'Email': $('#email').val(),
        'Formation': $('#formation').val(),
        'Captcha': $('#captcha').val()
    },
    dataType: 'html',
    success: function(data) {
        $('#notification').html(data);
        $("#notification").removeClass("alert alert-light my-5 d-none text-center").addClass("alert alert-light my-5 text-center");
    }
});
});