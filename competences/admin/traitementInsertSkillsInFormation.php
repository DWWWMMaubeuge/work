<?php 

if($_POST) {
  if(isset($_GET["id_formation"]) && isset($_GET["formation"]) && isset($_GET["nbSkills"])) {
    $id_formation = $_GET["id_formation"];
    $formation = $_GET["formation"];
    $nbSkills = $_GET["nbSkills"];
    $id_formation = intval($id_formation);
  
    // ON TESTE SI LES COMPETENCES EXISTENT DEJA
    for ($i = 0 ; $i < $nbSkills; $i++) {
      $competence = $_POST["skill" . $i];

      $req = $bdd->prepare("SELECT COUNT(*) as numberSkill FROM competences WHERE competences = :competence AND id_formation = :id_formation");
      $req->execute(array(
        "competence" => $competence,
        "id_formation" => $id_formation
      ));
  
      while ($skill_verification = $req->fetch()) {
        if ($skill_verification["numberSkill"] != 0) {
          header('location: ./insertSkillsInFormation.php?error=1&skill=' . $competence . '&nbSkills='. $nbSkills);
          exit();
        }
      }
      $req->closeCursor();
  
      // ON INSERT LA COMPETENCE DANS LA TABLE COMPETENCES
      $req = $bdd->prepare("INSERT INTO competences(competences, id_formation) VALUES(:competence, :id_formation)");
      $req->execute(array(
        "competence" => $competence,
        "id_formation" => $id_formation
      ));
      $req->closeCursor();
    }
  
    header('location: ../dashboardSU.php?success=1');
    exit();
   
  }

  header('location: ./insertSkillsInFormation.php?error=1&skill=1');
  exit();
}
?>