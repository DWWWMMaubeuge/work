<!DOCTYPE html>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Display Email Sent</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/display.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>


<?php
include_once("../functionConnect.php");
include_once("../functionHeader.php");
include_once( "addDeleteUpdate.php");


if(!isset($_SESSION["surname"])){
  header("Location: login.php");
  exit(); 
}?>

<body>
<div class="box-table">
  <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Admin <span>Panel</span></div>
                    <h1>Welcome <?php echo $_SESSION['surname']; ?>!</h1>
                    <ul>
                        <li><a href="adminPanel.php"><i class="fas fa-home"></i></a></li>
                        <li><a href="displayTraining.php"><i class="fas fa-chalkboard-teacher"></i></a></li>
                        <li><a href="../logOut.php"><i class="fas fa-power-off"></i></a></li>
                
                    </ul>
                </div>
            </div>
  </div>

<div class="container">
<?php

$req = "SELECT * FROM $DB_dbname.msgemail";

$result= executeSQL( $req );

?>


<div class="row justify-content-center">
    <table class="table">
      <thead>
        <tr>
          <th>Date</th>
          <th>Surname</th>
          <th>Name</th>
          <th>Type</th>
          <th>Training</th>
          <th>Email</th>
        </tr>
      </thead>
<?php

while ($row = $result->fetch_assoc()):

?>

<tr>
    <td><?php echo $row['date']; ?></td>
    <td><?php echo $row['surname']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['type']; ?></td>
    <td><?php echo $row['training']; ?></td>
    <td><?php echo $row['email']; ?></td>
</tr>


<?php 

endwhile ; 
?>

    </table>
    <div class="add">
<a href="emailToUser.php" class="btn btn-info" >Send Email</a>
</div>
</div>
</div>
</div>


</body>