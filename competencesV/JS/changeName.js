$(function() {
    $("#hideName").hide()


    $('#changeName').click(function(e){
        e.preventDefault()
        $("#hideName").toggle()
    })
})