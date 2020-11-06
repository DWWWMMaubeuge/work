$(function(){
    $('.door').mouseenter(function(){
        $('.door').animate({
            width:'toggle'
        })
    })
    $('.backDoor').mouseleave(function(){
        $('.door').animate({
            width:'toggle'
        })
    })
})

function disconnect(){
    location.href='disconnect.php'
}