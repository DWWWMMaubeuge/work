$('#activerComp').submit(function(e) {
        e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editcomps.php',
        data: {
            'ON': $('#enableComp').val(),
            'SESSION': $('#session').val()
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

$('#desactiverComp').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editcomps.php',
        data: {
            'OFF': $('#disableComp').val(),
            'SESSION': $('#session').val()
        },
        dataType: 'text',
        success: function(data) {
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
        }
    });
});

$('#ajoutComp').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editcomps.php',
        data: {
            'ADD': $('#add').val(),
            'ACTIVE': $('#is-activated').val(),
            'FORMATION': $('#formation').val(),
            'SESSION': $('#session').val()
        },
        dataType: 'text',
        success: function(data) {
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
        }
    });
});

$('#dates').submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: '../traitements/traitement-editcomps.php',
        data: {
            'DEBUT': $('#datedebut').val(),
            'FIN': $('#datefin').val(),
            'FORMATION': $('#formation').val(),
            'SESSION': $('#session').val()
        },
        dataType: 'text',
        success: function(data) {
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
        }
    });
});
