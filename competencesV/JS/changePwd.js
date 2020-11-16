$(function() {
    $("#hidePwd").hide()


    $('#changeMdp').click(function(e){
        e.preventDefault()
        $("#hidePwd").toggle()
    })
})