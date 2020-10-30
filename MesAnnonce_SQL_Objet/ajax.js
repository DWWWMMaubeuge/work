getDataAJAX( "div1", "compe10.php" );
getDataAJAX( "div2", "donneDate.php" );
getDataAJAX( "div3", "metsAuCarre.php?valeur=9" );
getDataAJAX( "div4", "metsAuCarre.php?valeur=4" );

function getCarre( valeur )
{
    getDataAJAX( "div4", "metsAuCarre.php?valeur="+valeur );
}


function getDataAJAX( divID, page )
{
    var getData = new XMLHttpRequest();
    getData.onreadystatechange = function () 
    {
        if( this.readyState == 4 && this.status == 200 )
        {
            document.getElementById( divID ).innerHTML = this.responseText;
        }
    }; 
    //getData.setRequestHeader('Access-Control-Request-Headers', 'x-requested-with');   
    getData.open( "GET", "http://localhost/Maubeuge/MesAnnoncesObjet/SQL/"+page, true  );    getData.open( "GET", "http://localhost/Maubeuge/MesAnnoncesObjet/SQL/"+page, true  )
    getData.send();

}