<?php

include_once("functionHeader.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<?php

setHeader();
NavBar();

?>

</body>
</html>
<body>

<div class="login-box">
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="bg-image"></div>
<h1>Register Form</h1>
<div  class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="Surname" name="surname" >
</div>
<div  class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="Name" name="name" >
</div>
<div  class="textbox">
<i class="fas fa-envelope"></i>
<input type="text" placeholder="Email" name="email">
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
<div  class="textbox">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" placeholder="Password" name="password" value="">
    </div>
<INPUT class="btn" type='submit' value='Sign in'>
<p class="text-center">Already a member? <a href="login.php">Sign In</a></p>
</div>
</FORM>
<?php

include_once("functionConnect.php");



if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['type'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email       = $_POST['email'];
    $type       = $_POST['type'];
    $training  = $_POST['training'];
    $password   = $_POST['password'];
   
$name = $conn -> real_escape_string($name);
$surname = $conn -> real_escape_string($surname);
$email = $conn -> real_escape_string($email);
$password = $conn -> real_escape_string($password);

$req= "SELECT * FROM $DB_dbname.users WHERE email='$email'";
if(mysqli_num_rows($req)>0)
{
  echo "Email already use";
}
else{
  $req = "INSERT INTO $DB_dbname.users ( name, surname, email, type, password ) VALUES ( '$name', '$surname', '$email', '$type', '$password' )";
    executeSQL( $req );
    header( "location: login.php");
  }

  }
?>
