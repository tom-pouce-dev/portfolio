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

$error = false;
$errorUrl = '../back/mentions.php?';

if(empty($_POST['texte'])){
	$error = true;
	$errorUrl = $errorUrl.'&contentEmpty';
}

if($error){
	header('Location: '.$errorUrl);
	exit();
}else{ 
	$set = 'intro = :i';
	$content = array(
			':i' => nl2br($_POST['texte']));

	$modif = $mysql->prepare('UPDATE page SET '.$set.' WHERE categorie = "mentions"');
	$modif->execute($content);

	header('Location: ../back/mentions.php?'.'&contentEdited');

}
