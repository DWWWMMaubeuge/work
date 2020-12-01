<?php
 /* $dest = "formafpaTest@gmail.com";
  $sujet = "Email de test";
  $corp = "Salut ceci est un email de test envoyer par un script PHP";
  $headers = "From: formafpaTest@gmail.com";
  if (mail($dest, $sujet, $corp, $headers)) {
    echo "Email envoyé avec succès à $dest ...";
  } 
  else 
  {
    echo "Échec de l'envoi de l'email...";
  }

*/

  //send email (bien redirigé vers thanYou.php mais pas de reception de mail)

  $to = "formafpaTest@gmail.com";
  $subject = "Email Verification";
  $message = "<a href='http://localhost/work/projetCompetence/login.php?'>Register Account</a>";
  $headers = "From: formafpaTest@gmail.com";
  $headers .= "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  if (mail($to,$subject,$message,$headers)) {
    echo "Email send successfully to $to";
    header('location: admin/thankYou.php');
  }
  else
  {
    echo "failure to send";
  }

?>