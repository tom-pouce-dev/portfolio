<?php
session_start();
error_reporting( E_ALL );

if(empty($_POST['comment']) && isset($_POST['nobot'])){
	if($_POST['objet'] == '' || $_POST['prenom'] == '' || $_POST['mail'] == '' || $_POST['message'] == '') {
		header('Location: ../index.php');
		}else{
			$to = 'werkmeister.thomas.michael@gmail.com';
			$subject = '[Site Web] '.$_POST['objet'];
			$message = 'Vous venez de recevoir un nouveau message depuis le formulaire de contact de votre site.
			
Contenu du message :
			  	
Expéditeur : '.$_POST['prenom'].'
Mail : '.$_POST['mail'].'

Objet : '.$_POST['objet'].'

'.$_POST['message'].'
			';
            $message = wordwrap($message, 150, "\r\n");
			$headers = 'FROM:' .$_POST['mail']."\r\n";
			mail($to, $subject, $message, $headers);
			header('Location: ../contact.php?Thanks');
		}
}
