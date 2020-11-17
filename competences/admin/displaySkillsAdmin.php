<?php
require '../src/connexion.php';

$req = $bdd->prepare("SELECT * FROM competences WHERE id_formation = :id_formation");
$req->execute(array(
  "id_formation" => $id_formation
));

while($item = $req->fetch()) {
  echo <<<item
        <tr>
          <th id="${item["id"]}" scope="row">${item["competences"]}</th>
          <td width="256px">
            <a href="#" class="btn btn-primary"><i class="far fa-edit"></i> Modifier</a>
            <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i> Supprimer</a>
          </td>
        </tr>
item;
}

?>