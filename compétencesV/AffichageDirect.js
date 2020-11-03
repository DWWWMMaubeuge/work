$(function(){
    $('#letableau').load('RecoverResult.php')
    $('#tabSkills').click(function(){
        $('#letableau').slideToggle('slow')
        $('#letableau').load('RecoverResult.php')
    })
})