
  $('#connexion').submit(function(e) {

      e.preventDefault();

    $.ajax({

        type: 'POST',
        url: 'traitements/traitement-connexion.php',
        data: {
            'email': $('#connexionemail').val(),
            'mdp': $('#password').val()
        },
        dataType: 'html',

        success: function(data) {

          if(data == "") {

              window.location.replace('profil.php');

          } else {

            alert(data);

          }

        }
    });
  });
