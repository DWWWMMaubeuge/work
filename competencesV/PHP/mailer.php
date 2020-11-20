<?php
include_once 'vendor/autoload.php';


function mailer($email,$password)
{
// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.bbox.fr', 25))
        ->setUsername('')
        ->setPassword('');

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message('Inscription auto-Evaluation'))
        ->setFrom(['super@user.fr' => 'Super User'])
        ->setTo($email)
        ->setBody("Voici vos identifiants pour vous connectez sur le site d'auto-évaluation de l'afpa:
                        identifiant:".$email."
                        mot de passe:".$password."
                        Rendez vous sur http://localhost/competencesV/index1.php pour débuter");

// Send the message
    $result = $mailer->send($message);
}
?>