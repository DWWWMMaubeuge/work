<?php
include_once("functionConnect.php");

function setWidgetValue2( $skill  )
{
  $widget = "<p>".$skill[1]."</p><input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )\">\n";
  return $widget;
}

/* echo "<div class='skills'>";
$widget = "<div class='skill-name'>".$skill[1]."</div>"."<div class='skill-bar'>"."<input id='number' type='number' value='0' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", this.value )"."</div>\n";
return $widget;
echo "</div>";*/

function setAllWidgetValue( $skills  )
{
    $widget = "<div id='valSkills' >\n";
    foreach( $skills as $skill )
        $widget .= setWidgetValue2( $skill );
    $widget .= "</div>\n";
    return $widget;
}

// Undefined index 'name' et 'surname'
session_start();
$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>Welcome $surname_user</h3>\n";


$req = "SELECT * FROM skills.skills";
$result = executeSQL( $req );

$skills = [];
while( $data = $result->fetch_assoc())
{
    array_push( $skills, [ $data['id'], $data[ 'skill']   ] );
}
?>

<script>
    function MAJ_Value( id_skill, value  )
    {
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


<FORM  method='POST' name="formSkill" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<?php echo setAllWidgetValue( $skills ); ?>
</FORM>








<!DOCTYPE html>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>










  <!--  Formulaire HTML
 <body>
    <div class="skills">
      <div class="skill">
        <div class="skill-name">HTML</div>
        <div class="skill-bar">
          
        <input type="range" id="html" name="html" min="0" max="10" >
        
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">CSS</div>
        <div class="skill-bar">
        <input type="range" id="css" name="css" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Javascript</div>
        <div class="skill-bar">
        <input type="range" id="JavaScript" name="JavaScript" min="0" max="10">
        </div>
      </div>
    
      <div class="skill">
        <div class="skill-name">PHP</div>
        <div class="skill-bar">
        <input type="range" id="PHP" name="PHP" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">AJAX</div>
        <div class="skill-bar">
        <input type="range" id="ajax" name="ajax" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Jquery</div>
        <div class="skill-bar">
        <input type="range" id="JavaScript" name="JavaScript" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Responsive</div>
        <div class="skill-bar">
        <input type="range" id="responsive" name="responsive" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">SQL</div>
        <div class="skill-bar">
        <input type="range" id="sql" name="sql" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Javascript</div>
        <div class="skill-bar">
        <input type="range" id="JavaScript" name="JavaScript" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Composer</div>
        <div class="skill-bar">
        <input type="range" id="composer" name="composer" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Symfony</div>
        <div class="skill-bar">
        <input type="range" id="symfony" name="symfony" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Doctrine</div>
        <div class="skill-bar">
        <input type="range" id="doctrine" name="doctrine" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Twig</div>
        <div class="skill-bar">
        <input type="range" id="twig" name="twig" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Agile</div>
        <div class="skill-bar">
        <input type="range" id="agile" name="agile" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">GIT</div>
        <div class="skill-bar">
        <input type="range" id="git" name="git" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">Python</div>
        <div class="skill-bar">
        <input type="range" id="python" name="python" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">SEO</div>
        <div class="skill-bar">
        <input type="range" id="seo" name="seo" min="0" max="10">
        </div>
      </div>

      <div class="skill">
        <div class="skill-name">RGPD</div>
        <div class="skill-bar">
        <input type="range" id="rgpd" name="rgpd" min="0" max="10">
        </div>
      </div>
    

    </div>

    
  </body>
  -->
</html>





