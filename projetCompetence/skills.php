<!DOCTYPE html>
 
<?php

  include_once("functionConnect.php");
  include_once("functionHeader.php");
  include_once("widgetValue.php");
  NavBar2();

?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
        <div class="row ">

           <?=setAllWidgetValue($skills)?>

        </div>
    </div>

    <script>
        function MAJ_Value( id_skill, value  )
        {
                                        
          document.getElementById("displaySkill"+id_skill).innerHTML = "" +value;


          var xhttp = new XMLHttpRequest();
          
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
            {
                document.getElementById("message_validation").innerHTML = "valeur enregistrée";
            }
          };

          xhttp.open("GET", "majValue.php?idSkill="+id_skill+"&valSkill="+value, true);
          xhttp.send();
        }   
    </script>

  </body>

</html>




