<?php

include('../config/settings.php');

if ( empty($_SESSION['user']) ) {
	header('Location: ../back/logIn.php');
	exit();
}

if( empty($_POST) ){
	header('Location: ../back/index.php');
	exit();
}

$set = 'facebook = :f, twitter = :t, pinterest = :p, youtube = :y';
$content = array(
		':f' => $_POST['fb'],
		':t' => $_POST['tw'],
		':p' => $_POST['pt'],
		':y' => $_POST['yt']);

$modif = $mysql->prepare('UPDATE social SET '.$set);
$modif->execute($content);

header('Location: ../back/account.php?'.'&socialEdited');
