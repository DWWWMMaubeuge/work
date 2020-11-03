$(function(){
    $("input").blur(function(){
        //id_mat=$(this).attr('id')
        //eval=$(this).val()
        //$.get('insertResult.php?id_mat='+id_mat+'&eval='+eval)
        $.post('insertResult.php',
            {
                id_mat: $(this).attr('id'),
                eval: $(this).val()

            })
    })
})