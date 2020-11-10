<?php

$isOk = 0;

if (isset($_GET["nbSkills"]) && !empty($_GET["nbSkills"])) {
  $nbSkills = $_GET["nbSkills"];
  $formation = $_GET["formation"];

  if($_POST) {
    for ($j = 0; $j < $nbSkills; $j++) {
      if (isset($_POST["skill" . $j])) {
        $isOk = 1;
      } else {
        header('location: ../admin/insertSkills.php?error=1&test=1');
        exit();
      }
    }

    if ($isOk == 1) {
      // ON TESTE SI LA FORMATION EXISTE DEJA
      $req = $bdd->prepare("SELECT COUNT(*) as numberFormation FROM formations WHERE formation = :formation");
      $req->execute(array(
        "formation" => $formation
      ));

      while ($formation_verification = $req->fetch()) {
        if ($formation_verification["numberFormation"] != 0) {
          header('location: ../superUser/insertFormation.php?error=1&formation=1');
          exit();
        }
      }
      $req->closeCursor();

      // ON INSERT LA FORMATION DANS LA TABLE FORMATIONS
      $req = $bdd->prepare("INSERT INTO formations(formation) VALUES(:formation)");
      $req->execute(array(
        "formation" => $formation
      ));
      $req->closeCursor();

      // ON RECUPERER L'ID DE LA FORMATION
      $req = $bdd->prepare("SELECT id FROM formations WHERE formation = :formation");
      $req->execute(array(
        "formation" => $formation
      ));

      $result = $req->fetch();
      $idFormation = $result["id"];

      // ON TESTE SI LES COMPETENCES EXISTENT DEJA
      for ($i = 0; $i < $nbSkills; $i++) {

        $req = $bdd->prepare("SELECT COUNT(*) as numberSkill FROM matieres WHERE mat = :competence AND id_formation = :idFormation");
        $req->execute(array(
          "competence" => $_POST["skill" . $i],
          "idFormation" => $idFormation
        ));

        while ($skill_verification = $req->fetch()) {
          if ($skill_verification["numberSkill"] != 0) {
            header('location: ./insertSkills.php?error=1&skill=' . $skill_verification["mat"]);
            exit();
          }
        }
        $req->closeCursor();

        // ON INSERT LA COMPETENCE DANS LA TABLE MATIERES
        $req = $bdd->prepare("INSERT INTO matieres(mat, id_formation) VALUES(:competence, :idFormation)");
        $req->execute(array(
          "competence" => $_POST["skill" . $i],
          "idFormation" => $idFormation
        ));
        $req->closeCursor();
      }
    }
  }
  
}
?>