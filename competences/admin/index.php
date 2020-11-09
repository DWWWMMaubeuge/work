<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

  <div class="container admin">
    <div class="row">
      <h1>Liste des compétences <a href="insertSkills.php" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter</a></h1>

      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">Compétences</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require 'displaySkillsAdmin.php';
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>