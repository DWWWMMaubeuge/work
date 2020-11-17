<?php
require_once 'vendor/autoload.php';

echo "Message envoyé !";

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.free.fr', 25))
  ->setUsername('thomas_3004@hotmail.fr')
  ->setPassword('K3igy-123');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Inscription DWWM'))
  ->setFrom(['admin@admin.fr' => 'Jean cule'])
  ->setTo('thomas_3004@hotmail.fr')
  ->setBody('Voici mon message test !')
  ;

// Send the message
$result = $mailer->send($message);