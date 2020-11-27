<?php

include_once("functionHeader.php");

?>
<!DOCTYPE html>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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



if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['type'] != "" && $_POST['training'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email       = $_POST['email'];
    $type       = $_POST['type'];
    $training  = $_POST['training'];
    $password   = $_POST['password'];
   

$req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE email='$email' ";
$result = executeSQL( $req );
$data = $result->fetch_assoc();
if ( $data[ 'nb' ] == 0 )
{
$req = "INSERT INTO $DB_dbname.users ( name, surname, email, type, training, password ) VALUES ( '$name', '$surname', '$email', '$type', '$training', '$password' )";
executeSQL( $req );
header( "location: login.php");
 
}
else{
       echo "<div class=\"alert alert-danger\" role=\"alert\">
              Email already used
            </div>";
  }

  }
?>
