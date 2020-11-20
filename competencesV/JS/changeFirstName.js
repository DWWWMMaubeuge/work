$(function() {
    $("#hideFirstName").hide()


    $('#changeFirstName').click(function(e){
        e.preventDefault()
        $("#hideFirstName").toggle()
    })
})