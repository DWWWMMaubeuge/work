  
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="CO_style.css" />
</head>
<body>
<?php

require_once('CO_bdd.php');
include_once('CO_addDeleteUpdate.php');

if (isset($_POST['submit'])){
  $submit = $_POST['submit'];

  header( "location: CO_AfficheUser.php");

}

?>
<form class="login-box" action="" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
    <h1>Update user</h1>
    <div class="textbox">
    <i class="fa fa-user" aria-hidden="true"></i>
  <input type="text" name="surname" value="<?php echo $surname; ?>"  placeholder="Surname" required />
    </div>
    <div class="textbox">
    <i class="fa fa-user" aria-hidden="true"></i>
  <input type="text" name="name" value="<?php echo $name; ?> "  placeholder="Name" required />
    </div>
    <div class="textbox">
      <select name="type" id="type" value="<?php echo $type; ?>" >
        <option value="admin">Admin</option>
        <option value="trainer">Trainer</option>
        <option value="learner">Learner</option>
      </select>
  </div>
    <div class="textbox">
       <i class="fas fa-envelope"></i>
    <input type="text" name="mail" value="<?php echo $mail; ?>" placeholder="Email" required />
  </div>
  <?php 
  if ($update == true):?>
      <input type="submit" name="update" value="Update" class="btn" />
<?php else: ?>
    <input type="submit" name="submit" value="Add" class="btn" />
<?php endif ?>
</form>


</body>
</html>