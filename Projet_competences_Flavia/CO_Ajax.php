<!DOCTYPE html>
<html>
<body>

    <select name="type" onchange="loadRace(this.value);">
        <option value="trainer">Trainer</option>
        <option value="trainee">Trainee</option>  
    </select>
    <br>
    <select name="training" id="selectTraining" >
    </select><br>
<script>
function loadRace ( type ) 
{
    console.log( "type: "+type )
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200 ) 
    {
      document.getElementById("selectTraining").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "http://http://localhost/work/Projet_Competences_Flavia/CO_getType.php?type="+type, true);
  xhttp.send();
}
</script>
 
</body>
</html>
