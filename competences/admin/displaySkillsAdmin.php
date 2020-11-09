<?php
require '../src/connexion.php';

$req = $bdd->prepare("SELECT * FROM matieres");
$req->execute();

while($item = $req->fetch()) {
  echo <<<item
        <tr>
          <th id="${item["id"]}" scope="row">${item["mat"]}</th>
          <td width="256px">
            <a href="#" class="btn btn-primary"><i class="far fa-edit"></i> Modifier</a>
            <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i> Supprimer</a>
          </td>
        </tr>
item;
}

?>