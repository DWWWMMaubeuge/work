<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style/addUser.css" />
</head>
<body>
<?php

require_once('../functionConnect.php');
include_once('addDeleteUpdate.php');

if (isset($_POST['submit'])){
  $submit = $_POST['submit'];

  header( "location: displayUser.php");

}

?>
<form class="login-box" action="" method="post">
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
       <i class="fas fa-envelope"></i>
    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email" required />
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