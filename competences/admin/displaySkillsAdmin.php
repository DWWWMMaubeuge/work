<?php
require '../src/connexion.php';

if(isset($_GET["id_formation"])) {
  $id_formation = $_GET["id_formation"];

  $req = $bdd->prepare("SELECT * FROM competences WHERE id_formation = :id_formation");
  $req->execute(array(
    "id_formation" => $id_formation
  ));

  while($item = $req->fetch()) {
    echo <<<item
          <tr>
            <th scope="row">${item["competences"]}</th>
            <td width="135px">
item;
            if($item["active"] == true) {
              echo '<a href="#" id="' . $item["id"] . '" class="btn btn-danger"><i class="fas fa-toggle-on"></i> Désactiver</a>';
            } else {
              echo '<a href="#" id="' . $item["id"] . '" class="btn btn-success"><i class="fas fa-toggle-on"></i> Activer</a>';
            }
    echo "    
            </td>
          </tr>";

  }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  var id_formation = '<?php echo $id_formation; ?>';
</script>
<script src="../js/test.js" type="text/javascript"></script>
