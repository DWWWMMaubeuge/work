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

})