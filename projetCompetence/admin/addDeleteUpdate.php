<?php

include_once("../functionConnect.php");




session_start();
// VALEURS PAR DEFAUT

$id = 0 ;
$update = false;
$surname = '';
$name = '';
$type = '';
$email = '';

//ADD USER

if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['type'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email      = $_POST['email'];
    $type       = $_POST['type'];
    $password   = $_POST['password'];

    

  $req = "INSERT INTO $DB_dbname.users ( name, surname, email, type, password ) VALUES ( '$name', '$surname', '$email', '$type', '$password')";
  executeSQL( $req );

   
    

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msgType'] = "success";
    header( "location: displayUser.php");
  
  
}

//DELETE USER

if(isset($_GET['delete'])){
    
    
    $id = $_GET['delete'];


    $req="DELETE FROM $DB_dbname.users WHERE id=$id";
    executeSQL( $req );
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msgType'] = "danger";
    
    header( "location: displayUser.php");
}

// UPDATE USER

if(isset($_GET['edit']))
{
    
    $id= $_GET['edit'];
    $update = true;

    $req= "SELECT * FROM $DB_dbname.users WHERE id=$id";
    $result= executeSQL( $req );

    if ($result)
    {
        
        $row = $result ->fetch_assoc();

        $surname = $row['surname'];
        $name = $row['name'];
        $type = $row['type'];
        $email = $row['email'];
    }

}

if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $email = $_POST['email'];


    $req="UPDATE  $DB_dbname.users SET surname='$surname', name='$name', type='$type', email='$email' WHERE id=$id";
    executeSQL( $req );

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msgType'] = "warning";
    
    header( "location: displayUser.php");

}

// send message to user

if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['type'] != "" && $_POST['training'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email       = $_POST['email'];
    $type       = $_POST['type'];
    $training   = $_POST['training'];
  
  $req = "INSERT INTO $DB_dbname.users ( name, surname, email, type, password ) VALUES ( '$name', '$surname', '$email', '$type', '$training' )";
    executeSQL( $req );

    if($req)
    {
        //send email ok !!

        $to      = $email;
        $subject = "Email Verification";
        $message = "<p>Votre demande d'inscription à la formation $type à bien été validée! Veuillez suivre le lien suivant pour vous connecter à votre compte</p>";
        $message .= "<a href='http://localhost/work/projetCompetence/login.php?'>Register Account</a>";
        $headers = "From: formafpaTest@gmail.com";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        if (mail($to,$subject,$message,$headers)) 
        {
          echo "Email send successfully to $to";
          header('location: admin/thankYou.php');
        }else
        {
          echo "failure to send";
        }

        
    }
}

?>