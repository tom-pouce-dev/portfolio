<?php

include('../config/settings.php');

if (empty($_SESSION['user'])) {
	header('Location: ../back/logIn.php');
	exit();
}


if (empty($_POST)){
	header('Location: ../back/index.php');
	exit();
}

$error = false;
$errorUrl = '../back/editCat.php?id='.$_POST['id'];

if(empty($_POST['nameCat'])){
	$error = true;
	$errorUrl = $errorUrl.'&catEmpty';
}

if($error){
	header('Location: '.$errorUrl);
	exit();
}else{ 
	$set = 'nomCategorie = :n';
	$content = array(
			':n' => $_POST['nameCat'],
			':i' => $_POST['id']);

	$modif = $mysql->prepare('UPDATE albumcategorie SET '.$set.' WHERE id = :i');
	$modif->execute($content);

	header('Location: ../back/editCat.php?id='.$_POST['id'].'&contentEdited');
}
