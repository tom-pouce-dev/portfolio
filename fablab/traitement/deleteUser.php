<?php

include('../config/settings.php');

if( empty($_SESSION['user']) || $_SESSION['level'] != 'admin'){
	header('Location: ../back/account.php');
	exit();
}

if(empty($_POST)){
	header('Location: ../back/account.php');
	exit();
}

$transfert = $mysql->prepare('UPDATE contenus SET created_by = :new WHERE created_by = :old');
$transfert->execute(array(':new' => $_POST['newOwner'],
							':old' => $_POST['oldOwner']));

$suppression = $mysql->prepare('DELETE FROM users WHERE id = :i');
$suppression->execute(array(':i' => $_POST['oldOwner']));

header('Location: ../back/account.php?userDeleted');