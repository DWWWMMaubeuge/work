function getMoyennes(id, value) {
    $('#form-moyennes').submit();
    e.preventDefault();
    alert(value);
    let post = {};
    post[id] = value;
    $.ajax({
        type: 'POST',
        url: '../moyennes.php',
        data: post,
        dataType: 'text',
        success: function(data) {
            
        }
    });
}