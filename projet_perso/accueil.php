<?php

include "header.php";
echo entete();
include "navbar.php";
echo nav();

?>

<body>
<div class="titre">
<h1>Nicolas CAULIER Développeur Web</h1>
</div>
<div class="">

<?php
include_once "bodyaccueil.php";
echo carousel();
?>

</div>
<div class="body">
<?php

echo accueilbody();

?>
</div>
<?php

Include "footer.php";
echo footer();

?>

</body>

</html>
