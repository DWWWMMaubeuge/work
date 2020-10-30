<input type="button" value="IMMOBILIER" onclick="chargeAnnonce('IMO');">
<input type="button" value="VOITURE" onclick="chargeAnnonce('CAR');">
<input type="button" value="VOILIER" onclick="chargeAnnonce('VOI');">
<input type="button" value="ANIMAUX" onclick="chargeAnnonce('ANI');">


<style>
.container_annonces
{
  display: flex;
  flex-wrap: wrap;
  background-color: DodgerBlue;
}


.vignette_annonce  
{
  background-color: #FFFFFF;
  width: 200px;
  height: 230px;
  margin: 10px;
  text-align: center;
  line-height: 15px;
  font-size: 12px;
}
</style>

<?php
include ( 'AO_fonctions_generalesSQL.php');

setHeaderNoCache();

?>
<script>
function chargeAnnonce ( type ) 
{
    console.log( "type: "+type )

  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200 ) 
    {
      document.getElementById("divContainerAnnonces").innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "http://localhost/Maubeuge/MesAnnoncesObjet/SQL/getAnnonces.php?type="+type, true);
  xhttp.send();
}
</script>


<?php


echo "<div class=\"container_annonces\" id=\"divContainerAnnonces\">";
echo "</div>";


?>
<br>
<a href='saisie_annonce.php'>ajouter une annonce</a>