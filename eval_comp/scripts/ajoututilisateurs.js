function getSessions() {
    
    let mydiv = document.getElementById("selectsession");
    let selectsession = document.getElementById("idsession");
    let option = document.createElement("option");
    
    if($('#idformation').val() != "") {
    
        $.ajax({
            type: 'POST',
            url: '../config/getsessions.php',
            data: {
                'idformation': $('#idformation').val()
            },
            dataType: 'html',
            success: function(data) {
                mydiv.className = "form-group my-5";
                selectsession.outerHTML = data;
            }
        });
    
    } else {
        
        mydiv.className = "form-group my-5 d-none";
        selectsession.outerHTML = "<select name='idsession' id='idsession'><option value=''></option></select>";
        
    }
    
}

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
            $('html, body').animate({
                scrollTop: $("body").offset().top
            }, 0);
        }
    });
});