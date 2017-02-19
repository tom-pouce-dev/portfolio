<?php

include('../config/settings.php');

if ( empty($_SESSION['user']) ) {
	header('Location: ../back/logIn.php');
	exit();
}


if( empty($_POST) ){
	header('Location: ../back/galerie.php');
	exit();
}

$error = false;
$errorUrl = '../back/editAlb.php?id='.$_POST['id'];

if(empty($_POST['name'])){
	$error = true;
	$errorUrl = $errorUrl.'&nameEmpty';
}else{
	$errorUrl = $errorUrl.'&nom='.$_POST['name'];
}

if($_FILES['visuel']['size'] > 0 && $_FILES['visuel']['error'] > 0){
	$error = true;
	$errorUrl = $errorUrl.'&fileError';
}

if($_FILES['visuel']['size'] > 1048576) {
	$error = true;
	$errorUrl = $errorUrl.'&maxSize';
}


if($_FILES['visuel']['size'] > 0){

	$extensions_valides = array('png', 'jpg', 'jpeg', 'gif');

	$nomDuFichier = $_FILES['visuel']['name'];

	$patternDuFichier = explode('.', $nomDuFichier);

	$extension_du_fichier = $patternDuFichier[ count($patternDuFichier) -1];

	$extension_minuscule = strtolower($extension_du_fichier);

	if( !in_array($extension_minuscule, $extensions_valides) ){
		$error = true;
		$errorUrl = $errorUrl.'&extensionError';
	}
}

if($error){
	header('Location: '.$errorUrl);
	exit();
}else{ 
	$set = 'name_album = :n';
	$content = array(
			':n' => $_POST['name'],
			':i' => $_POST['id']);

	if($_FILES['visuel']['size'] > 0){
		
		$visu = $mysql->prepare('SELECT description FROM albumsphotos WHERE id = :i');
		$visu->execute(array(':i' => $_POST['id']));

		$data = $visu->fetch();

		if(!empty($data['description']) && file_exists('../'.$data['description'])){
			unlink('../'.$data['description']);
		}
		
		$nbre = rand(0, 100);
        $nom = 'img/galerie/album-'.$_POST['id'].'-thumb-'.$nbre.'.'.$extension_minuscule;
		$set .= ', description = :d';
		$content[':d'] = $nom;

		move_uploaded_file($_FILES['visuel']['tmp_name'], '../'.$nom);

	}

	$modif = $mysql->prepare('UPDATE albumsphotos SET '.$set.' WHERE id = :i');
	$modif->execute($content);

	header('Location: ../back/editAlb.php?id='.$_POST['id'].'&apercuEdited');
}
