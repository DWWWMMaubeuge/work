$(function(){
    $('#letableau').load('tabGraph.php')
    $('#tabSkills').click(function(){
        $('#letableau').slideToggle('slow')
        $('#letableau').load('tabGraph.php')
    })
})