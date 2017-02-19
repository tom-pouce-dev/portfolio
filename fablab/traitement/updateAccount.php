<?php

include('../config/settings.php');

if( empty($_SESSION['user']) ){
	header('Location: ../back/logIn.php');
	exit();
}

if( empty($_POST) ){
	header('Location: ../back/account.php');
	exit();
}

$verif = $mysql->prepare('SELECT * FROM users WHERE id = :i AND password = :p');
$verif->execute(array(
		':i' => $_SESSION['id'],
		':p' => crypte($_POST['oldPass'])
	));

if( $verif->rowCount() == 0){
	header('Location: ../back/account.php?passwordUnknown');
	exit();
}

if(empty($_POST['password'])){
	header('Location: ../back/account.php?passwordEmpty');
	exit();
}

if($_POST['password'] != $_POST['confirmPassword']){
	header('Location: ../back/account.php?confirmationPassword');
	exit();
}

$modif = $mysql->prepare('UPDATE users SET password = :p WHERE id = :i');
$modif->execute(array(
		':i' => $_SESSION['id'],
		':p' => crypte($_POST['password'])
	));

header('Location: ../back/account.php?passwordUpdated');
