<?php

include_once("CO_bdd.php");



session_start();
// VALEURS PAR DEFAUT

$id = 0 ;
$update = false;
$surname = '';
$name = '';
$type = '';
$email = '';

//ADD USER

if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['type'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $mail       = $_POST['mail'];
    $type       = $_POST['type'];
    $password   = $_POST['password'];


  $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, type, password ) VALUES ( '$name', '$surname', '$mail', '$type', '$password' )";
  executeSQL( $req );

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msgType'] = "success";
    header( "location: CO_AfficheUser.php");
  
}

//DELETE USER

if(isset($_GET['delete'])){
    
    
    $id = $_GET['delete'];


    $req="DELETE FROM $DB_dbname.users WHERE id=$id";
    executeSQL( $req );
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msgType'] = "danger";
    
    header( "location: CO_AfficheUser.php");
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
        $mail = $row['mail'];
    }

}

if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $mail = $_POST['mail'];


    $req="UPDATE  $DB_dbname.users SET surname='$surname', name='$name', type='$type', mail='$mail' WHERE id=$id";
    executeSQL( $req );

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msgType'] = "warning";
    
    header( "location: CO_AfficheUser.php");

}



?>