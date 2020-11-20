<?php
session_start();
$id=0;
if(isset($_SESSION[ 'ID_user' ]))
    $id=$_SESSION[ 'ID_user' ];
    $name= $_SESSION['name'];
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
echo "<h2 class=\"lol\">bienvenue $name</h2>";
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

<?php

Include "footer.php";
echo footer();

?>

</body>

</html>
