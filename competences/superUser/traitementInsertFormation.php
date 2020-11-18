<?php
require '../src/connexion.php';

if (!empty($_GET["formation"]) && isset($_GET["nbSkills"])) {
  $nbSkills = $_GET["nbSkills"];
  $formation = $_GET["formation"];

  if ($nbSkills == 0) {
    // ON TESTE SI LA FORMATION EXISTE DEJA
    $req = $bdd->prepare("SELECT COUNT(*) as numberFormation FROM formations WHERE formation = :formation");
    $req->execute(array(
      "formation" => $formation
    ));

    while ($formation_verification = $req->fetch()) {
      if ($formation_verification["numberFormation"] != 0) {
        header('location: ./insertFormation.php?error=1&formation=1');
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

    header('location: ../dashboardSU.php?succes=1');
    exit();
  } else {
    // ON TESTE SI LA FORMATION EXISTE DEJA
    $req = $bdd->prepare("SELECT COUNT(*) as numberFormation FROM formations WHERE formation = :formation");
    $req->execute(array(
      "formation" => $formation
    ));

    while ($formation_verification = $req->fetch()) {
      if ($formation_verification["numberFormation"] != 0) {
        header('location: ./insertFormation.php?error=1&formation=1');
        exit();
      }
    }
    $req->closeCursor();

    header('Location: ../admin/insertSkills.php?formation=' . $formation . '&nbSkills=' . $nbSkills);
  }
}
?>

<script>

</script>