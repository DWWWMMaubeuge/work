<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../addUser.css" />
</head>
<body>
<?php
require('../functionConnect.php');

if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['type'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email       = $_POST['email'];
    $type       = $_POST['type'];
    $password   = $_POST['password'];

  $req = "INSERT INTO $DB_dbname.users ( name, surname, email, type, password ) VALUES ( '$name', '$surname', '$email', '$type', '$password' )";
  executeSQL( $req );
  if($req){
       echo "<h3>New user  created successfully.</h3>
             <p>Click  <a href='home.php'>here</a> to go back to the home page</p>";
    }
}else{
?>
<form class="login-box" action="" method="post">
    <h1>Add user</h1>
    <div class="textbox">
    <i class="fa fa-user" aria-hidden="true"></i>
  <input type="text" name="surname"  placeholder="Surname" required />
    </div>
    <div class="textbox">
    <i class="fa fa-user" aria-hidden="true"></i>
  <input type="text" name="name"  placeholder="Name" required />
    </div>
    <div class="textbox">
       <i class="fas fa-envelope"></i>
    <input type="text" name="email" placeholder="Email" required />
  </div>
  <div class="textbox">
      <select name="type" id="type" >
        <option value="" disabled selected>Type</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
  </div>
  <div class="textbox">
  <i class="fa fa-lock" aria-hidden="true"></i>
    <input type="password" name="password" placeholder="Mot de passe" required />
  </div>
    <input type="submit" name="submit" value="Add" class="btn" />
</form>

<?php } ?>
</body>
</html>