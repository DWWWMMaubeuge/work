$('#confirmer-invitation').submit(function(e) {
    e.preventDefault();
$.ajax({
    type: 'POST',
    url: '../traitements/traitement-invitations.php',
    data: {
        'Email': $('#email').val(),
        'Idformation': $('#idformation').val(),
        'Idsession': $('#idsession').val(),
        'Confirmation': $('#choix').val(),
        'Captcha': $('#captcha').val()
    },
    dataType: 'html',
    success: function(data) {
        
        if(data == "Votre choix a bien été pris en compte ! Vous allez être redirigé vers votre profil") {
            
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-light my-5 d-none text-center").addClass("alert alert-light my-5 text-center");
            
            setTimeout(() => {

                window.location.replace('../profil.php');

            }, 2000);
            
        } else {
            
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-light my-5 d-none text-center").addClass("alert alert-light my-5 text-center");
            
        }
    }
});
});