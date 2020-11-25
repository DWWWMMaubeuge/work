<?php
session_start();
$id=0;
if(isset($_SESSION[ 'ID_user' ]))
    $id=$_SESSION[ 'ID_user' ];
    //$name= $_SESSION['name'];
include "header.php";
echo entete();
include "navbar.php";
include_once "bodyaccueil.php";
?>

<div>
<?php
echo nav($id);
?>
</div>


<body>
<div class="titre">
<h1>Nicolas CAULIER Développeur Web</h1>
<?php

if(isset($_SESSION[ 'ID_user' ]))
{
    $name= $_SESSION['name'];
echo "<h2 class=\"lol\">bienvenue $name</h2>";
}
else{
    echo "";
}
?>
</div>

</div>

<div class="carou">
<?php
echo carousel();
?>
</div>

<div class="body">
<?php
echo accueilbody();
?>
</div>

<div>
 <?php
echo langues();
?> 
</div>
<div class="carte">
<iframe id="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40791.29182053919!2d3.9260860090344627!3d50.283420189733704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2429dcd7d7533%3A0x40af13e81646100!2s59600%20Maubeuge!5e0!3m2!1sfr!2sfr!4v1597927697163!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<?php

Include "footer.php";
echo footer();

?>

</body>

</html>
