$(function(){

    $(".graph").click(function(){
        var id_mat=$(this).attr('id');
        //console.log($id_mat)
        let src="graphAdmin.php?idMat="+id_mat+"&idUser="+id_user
        $('#graphAdmin').attr("src", src)
        //console.log($("#graph").attr('src'))
    })

    $('#graphAdmin').click(function(){
        $('#graphAdmin').attr('src',' ')
    })

    $(document).scroll(function(){
        windowScroll()
    })

    function windowScroll(){
        var st = $(document).scrollTop();

        $("#moving-div").css({"top": 32 + st * 1.4 + "px"});
    }
})