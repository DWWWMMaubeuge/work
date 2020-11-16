<?php
session_start();

// initializing variables
$surname = "";
$mail    = "";
$errors = array(); 
$_SESSION['success'] = "";
$type = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'dwwm_maubeuge');

// REGISTER USER  
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $surname = mysqli_real_escape_string($db, $_POST['surname']);
  $mail = mysqli_real_escape_string($db, $_POST['mail']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($surname)) { array_push($errors, "surname is required"); }
  if (empty($mail)) { array_push($errors, "mail is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same surname and/or mail
  $user_check_query = "SELECT * FROM users WHERE mail='$mail' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists

    if ($user['mail'] === $mail) {
      array_push($errors, "mail already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (name, surname, mail, password) 
  			  VALUES('$name','$surname', '$mail', '".hash('sha256', $password)."')";
  	mysqli_query($db, $query);
  	$_SESSION['surname'] = $surname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: Skills.php');
  }
}

// ... 


// LOGIN USER
if (isset($_POST['login_user'])) {
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if (empty($surname)) {
        array_push($errors, "L'Username est demandé");
    }
    if (empty($password)) {
        array_push($errors, "Le Password est demandé");
    }
    if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
    {
      $status = "<p style='color:#FFFFFF; font-size:20px'>
      <span style='background-color:#46ab4a;'>Votre code captcha est correct.</span></p>"; 
    }else{
    array_push($errors, "Le code captcha entré ne correspond pas! Veuillez réessayer");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE surname='$surname' AND password='".hash('sha256', $password)."'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) 
        {
          $_SESSION['surname'] = $surname;
          $_SESSION['success'] = "You are now logged in";
          $user_check_query = "SELECT * FROM users WHERE surname=".$_SESSION['surname'];
          $result = mysqli_query($db, $user_check_query);
          $user = mysqli_fetch_assoc($result);
          $_SESSION["code"]=$code;
          if ($user['type'] == 'admin')
          {
            header ('location: admin_home.php');
          }
          else
          {
            header('location: Skills.php');
          }
        }
        else 
        {
            array_push($errors, "Wrong surname/password combination");
        }
    }
  }
  
  ?>