$(function(){
    $('#submitFormation').click(function(){
        let newFormation = $('#addFormation').val()
        $.post('PHP/SQLInsertFormation.php' ,{
            form: newFormation
        },function() {
            $('#msg1').html('Formation ajoutée avec succés')
            $('#msg1').addClass("alert alert-success mt-2")
        })
    })

    $('#submitAdminRight').click(function(){
        $.post('PHP/SQLAdminRight.php',{
            user: $('#userList').val(),
            admin: $('input[name=inlineRadioOptions]:checked').val()
        },function () {
            $('#msg2').html("Droit d'admin modifié avec succés")
            $('#msg2').addClass("alert alert-success mt-2")
        })
    })
})