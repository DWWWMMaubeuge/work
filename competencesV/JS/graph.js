$(function(){
    $(".graph").click(function(){
        var $id_mat=$(this).attr('id');
        //console.log($id_mat)
        let src="graph.php?idMat="+$id_mat
        $('#graph').attr("src", src)
        //console.log($("#graph").attr('src'))
    })
    $('#graph').click(function(){
        $('#graph').attr('src',' ')
    })
})
