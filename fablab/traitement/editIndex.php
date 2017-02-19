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
$errorUrl = '../back/index.php?';

if(empty($_POST['titreW']) || empty($_POST['titreX']) || empty($_POST['titreY']) || empty($_POST['titreZ']) || empty($_POST['textW']) || empty($_POST['textX']) || empty($_POST['textY']) || empty($_POST['textZ'])){
	$error = true;
	$errorUrl = $errorUrl.'&textEmpty';
}

if($error){
	header('Location: '.$errorUrl);
	exit();
}else{ 
	$set = 'title = :t, resume = :n';
	$content = array(
			':c' => '1',
			':t' => $_POST['titreW'],
			':n' => nl2br($_POST['textW']));

	$modif = $mysql->prepare('UPDATE home SET '.$set.' WHERE id = :c');
	$modif->execute($content);
	
	$set2 = 'title = :t, resume = :n';
	$content2 = array(
			':c' => '2',
			':t' => $_POST['titreX'],
			':n' => nl2br($_POST['textX']));

	$modif2 = $mysql->prepare('UPDATE home SET '.$set2.' WHERE id = :c');
	$modif2->execute($content2);
	
	$set3 = 'title = :t, resume = :n';
	$content3 = array(
			':c' => '3',
			':t' => $_POST['titreY'],
			':n' => nl2br($_POST['textY']));

	$modif3 = $mysql->prepare('UPDATE home SET '.$set3.' WHERE id = :c');
	$modif3->execute($content3);
	
	$set4 = 'title = :t, resume = :n';
	$content4 = array(
			':c' => '4',
			':t' => $_POST['titreZ'],
			':n' => nl2br($_POST['textZ']));

	$modif4 = $mysql->prepare('UPDATE home SET '.$set4.' WHERE id = :c');
	$modif4->execute($content4);

	header('Location: ../back/index.php?&contentEdited');
}
