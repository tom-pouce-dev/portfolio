<?php

//on importe la config
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
$errorUrl = '../back/intro.php?';

if(empty($_POST['act'])){
	$error = true;
	$errorUrl = $errorUrl.'&enteteEmpty';
}

if(empty($_POST['dhu'])){
	$error = true;
	$errorUrl = $errorUrl.'&enteteEmpty';
}

if($error){
	header('Location: '.$errorUrl);
	exit();
}else{ 
	$set = 'intro = :i';
	$content = array(
			':w' => 'activites',
			':i' => nl2br($_POST['act']));

	$modif = $mysql->prepare('UPDATE page SET '.$set.' WHERE categorie = :w');
	$modif->execute($content);
	
	$set2 = 'intro = :n';
	$content2 = array(
			':c' => '3dhubs',
			':n' => nl2br($_POST['dhu']));

	$modif2 = $mysql->prepare('UPDATE page SET '.$set2.' WHERE categorie = :c');
	$modif2->execute($content2);
	
	$set3 = 'intro = :n';
	$content3 = array(
			':c' => 'galerie',
			':n' => nl2br($_POST['gal']));

	$modif3 = $mysql->prepare('UPDATE page SET '.$set3.' WHERE categorie = :c');
	$modif3->execute($content3);
    
    $set9 = 'intro = :n';
	$content9 = array(
			':c' => 'slash',
			':n' => nl2br($_POST['sla']));

	$modif9 = $mysql->prepare('UPDATE page SET '.$set9.' WHERE categorie = :c');
	$modif9->execute($content9);

	header('Location: ../back/intro.php?'.'&contentEdited');
}
