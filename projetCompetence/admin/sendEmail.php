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
// send message to user

if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['type'] != "" && $_POST['training'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email       = $_POST['email'];
    $type       = $_POST['type'];
    $training   = $_POST['training'];
  
  $req = "INSERT INTO $DB_dbname.msgemail ( name, surname, email, type, training ) VALUES ( '$name', '$surname', '$email', '$type', '$training' )";
    executeSQL( $req );

    if($req)
    {
        //send email ok !!

        $to      = $email;
        $subject = "Email Verification";
        $message = "<p>Bonjour $surname, afin de completer votre inscription à la formation $training en tant que $type, veuillez suivre le lien suivant : </p>";
        $message .= "<a href='http://localhost/work/projetCompetence/register.php?'>Register Account</a>";
        $headers = "From: formafpaTest@gmail.com";
        $headers .= "Centre de formation" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        if (mail($to,$subject,$message,$headers)) 
        {
          echo "Email send successfully to $to";
          header('location: admin/thankYou.php');
        }
        else
        {
          echo "failure to send";
        }

    }
}


?>