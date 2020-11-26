<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style/addUser.css" />
</head>
<body>
<?php

require_once('../functionConnect.php');
include_once('sendEmail.php');

if (isset($_POST['submit'])){
  $submit = $_POST['submit'];

  header( "location: displayMsg.php");

}

?>
<form class="login-box" action="" method="post">
    <h1>New Message to user</h1>
    <div class="textbox">
    <i class="fa fa-user" aria-hidden="true"></i>
  <input type="text" name="surname" value="<?php echo $surname; ?>"  placeholder="Surname" required />
    </div>
    <div class="textbox">
    <i class="fa fa-user" aria-hidden="true"></i>
  <input type="text" name="name" value="<?php echo $name; ?> "  placeholder="Name" required />
    </div>
    
  <div class="textbox">
      <select name="type" id="type" >
        <option value="admin">Admin</option>
        <option value="trainer">Trainer</option>
        <option value="learner">Learner</option>
      </select>
  </div>
  <div class="textbox">
      <select name="training" id="training" >
        <option value="pastry">Pastry</option>
        <option value="dwm">DWM</option>
        <option value="english">English</option>
      </select>
  </div>
  <div class="textbox">
       <i class="fas fa-envelope"></i>
    <input type="text" name="email" value="<?php echo $email; ?>" placeholder="Email" required />
  </div>
    <input type="submit" name="submit" value="Send" class="btn" />
</form>

</body>
</html>