<!DOCTYPE html>
 
<?php

  include_once("../functionConnect.php");
  include_once("widgetValue.php");

?>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../style/display.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
  <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Learner <span>Panel</span></div>
                    <h1>Welcome <?php echo $_SESSION['surname']; ?>!</h1>
                    <ul>
                        <li><a href="learnerPanel.php"><i class="fas fa-home"></i></a></li>
                        <li><a href="../logOut.php"><i class="fas fa-power-off"></i></a></li>
                
                    </ul>
                </div>
            </div>
           <!--header menu end-->
    <div class="container">
            <h2>Please rate yourself from 0 to 10 according to the differents skills :
           </h2>
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




