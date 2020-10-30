
<div id='menu'>
</div>

<div id='main'>
</div>

<div id='footer'>
</div>



<script>

chargeMenu( "general" );
chargeMain( "general" );
chargeFooter( "general" );

function chargeWebService ( type, id, page ) 
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() 
  {
    if (this.readyState == 4 && this.status == 200 ) 
      document.getElementById( id ).innerHTML = this.responseText;
  };
  xhttp.open("GET", "http://localhost/Maubeuge/MesAnnoncesObjet/SQL/"+ page + "?type="+type, true);
  xhttp.send();
}


function chargeMenu ( type ) 
{
    chargeWebService( type, "menu", "getMenu.php" );
}

function chargeMain ( type ) 
{
    chargeWebService( type, "main", "getMain.php" );
}

function chargeFooter ( type ) 
{
    chargeWebService( type, "footer", "getFooter.php" );
}
</script>

