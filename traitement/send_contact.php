<?php
session_start();
error_reporting( E_ALL );

// Variable to check
$email = $_POST['email'];

// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if(empty($_POST['comment'])){
	if($_POST['subject'] == '' || $_POST['prenom'] == '' || $email == '' || $_POST['message'] == '') {
		header('Location: ../index.php');
		}else{
			$to = 'werkmeister.thomas@wanadoo.fr';
			$subject = '[Site Web] '.$_POST['subject'];
			$message = 'Vous venez de recevoir un nouveau message depuis le formulaire de contact de votre site.
			
Expéditeur : '.$_POST['prenom'].'
Mail : '.$email.'
Objet : '.$_POST['subject'].'

'.$_POST['message'].'
			';
            $message = wordwrap($message, 150, "\r\n");
			$headers = 'FROM : ' .$email."\r\n";
			mail($to, $subject, $message);
//        bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] );
			header('Location: ../contact.php?Thanks');
		}
}

