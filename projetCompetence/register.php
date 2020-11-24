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
    $password   = $_POST['password'];
    // A revoir utilisation obsoléte de md5
    //$vkey = md5(time().$name);

    // verification doublons emails 
    $emailQuery = "SELECT * FROM $DB_dbname.users WHERE email=? LIMIT 1 ";
    $stmt = $conn-> prepare($emailQuery);
    $stmt-> bind_param('s',$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;

    if($userCount > 0){
      $errors['email'] = "Email already exists";
    }

  $req = "INSERT INTO $DB_dbname.users ( name, surname, email, type, password ) VALUES ( '$name', '$surname', '$email', '$type', '$password' )";
    executeSQL( $req );

    if($req)
    {
        //send email (bien redirigé vers thanYou.php mais pas de reception de mail)
        $to = $email;
        $subject = "Email Verification";
        $message = "<a href='http://localhost/work/login.php?vkey=$vkey'>Register Account</a>";
        $headers = "From: fatformationafpa@gmail.com";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to,$subject,$message,$headers);

        header('location: admin/thankYou.php');
    }
}

?>
