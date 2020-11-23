$(function() {
    $("#hideName").hide()
    $("#successName").hide()

    $('#changeName').click(function(e){
        e.preventDefault()
        $("#hideName").toggle()
    })
    $("#submitNewName").click(function() {
        $.post('PHP/SQLChangeName.php',{
            newName: $("#newName").val()
        },function(){
            $("#successName").show()
            setTimeout(function(){
                $("#successName").fadeOut()
            },2000)
            $('#changeName').text($("#newName").val())
        })
    })

    $("#hideFirstName").hide()
    $("#successFirstName").hide()
    $('#changeFirstName').click(function(e){
        e.preventDefault()
        $("#hideFirstName").toggle()
    })

    $("#submitNewFirstName").click(function() {
        $.post('PHP/SQLChangeFirstName.php',{
            newFirstName: $("#newFirstName").val()
        },function(){
            $("#successFirstName").show()
            setTimeout(function(){
                $("#successFirstName").fadeOut()
            },2000)
            $('#changeFirstName').text($("#newFirstName").val())
        })
    })

    $("#hidePwd").hide()
    $("#successPwd").hide()

    $('#changeMdp').click(function(e){
        e.preventDefault()
        $("#hidePwd").toggle()
    })

    $("#submitNewPwd").click(function () {
        $.post("PHP/SQLChangeMdp",{
            newPwd : $("#newPwd").val()
        },function(){
            $("#successPwd").show()
            setTimeout(function(){
                $("#successPwd").fadeOut()
            },2000)
        })
    })



})