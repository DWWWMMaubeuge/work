$(function(){
    $('#Div1').load("formAdminMat.php")
    $('#liste').load("StudentList.php")
    $('input[type=submit]').click(function(e){
        e.preventDefault()
        $('#Div1').load("formAdminMat.php")
    })

})