<?php

include('../config/settings.php');

if( empty($_POST) ){
	header('Location: ../back/logIn.php');
	exit();
}

if( empty($_POST['nom']) || empty($_POST['motDePasse'])){
	header('Location: ../back/logIn.php?logEmpty');
	exit();
}

$pass = crypte($_POST['motDePasse']);

$user = $mysql->prepare('SELECT * FROM users WHERE pseudo = :pseudo AND password = :password ');
$user->execute(array(
		':pseudo' => $_POST['nom'],
		':password' => $pass
	));

if( $user->rowCount() == 0 ){
	header('Location: ../back/logIn.php?userUnknown');
	exit();
}else{
	$data = $user->fetch();
	
	$_SESSION['user'] = $_POST['nom'];
	$_SESSION['id'] = $data['id'];
	$_SESSION['level'] = $data['level'];

	header('Location: ../back/index.php');
	exit();
}


