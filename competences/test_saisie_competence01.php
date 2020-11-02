<?php








?>

<script>

function MAJValue( id_skill, value  )
{

  var xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
    {
     	document.getElementById("message_validation").innerHTML = "valeur enregistrée";
    }
  };

  xhttp.open("GET", "maj_value.php?id_skill="+id_skill+"&value="+value, true);
  xhttp.send();
}	



}



</script>	

<select name="compet">
<input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='' name='valSkill_HTML' onchange="MAJValue( 2, this.value  )">";
<input type='range'  value='0' class='form-control-range' min='0' step='1' max='10' id='' name='valSkill_CSS' onchange="MAJValue( 3, this.value  )">";
</select>

<p id="message_validation"></p>
