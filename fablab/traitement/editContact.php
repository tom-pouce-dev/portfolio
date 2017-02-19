<?php

include('../config/settings.php');

if (empty($_SESSION['user'])) {
	header('Location: ../back/logIn.php');
	exit();
}

if(empty($_POST)){
	header('Location: ../back/index.php');
	exit();
}

$error = false;
$errorUrl = '../back/contact.php?';

if(empty($_POST['adress'])){
	$error = true;
	$errorUrl = $errorUrl.'&adressEmpty';
}

if(empty($_POST['phone'])){
	$error = true;
	$errorUrl = $errorUrl.'&phoneEmpty';
}

if(empty($_POST['open'])){
	$error = true;
	$errorUrl = $errorUrl.'&openedEmpty';
}

if($error){
	header('Location: '.$errorUrl);
	exit();
}else{ 
	$set = 'adress = :t, phone = :p, opened = :o';
	$content = array(
			':t' => nl2br($_POST['adress']),
			':p' => nl2br($_POST['phone']),
			':o' => nl2br($_POST['open']));

	$modif = $mysql->prepare('UPDATE contact SET '.$set);
	$modif->execute($content);

	header('Location: ../back/contact.php?'.'&contentEdited');
}
