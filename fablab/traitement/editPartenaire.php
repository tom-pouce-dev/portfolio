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
$errorUrl = '../back/editPartenaire.php?id='.$_POST['id'];

if(empty($_POST['name'])){
	$error = true;
	$errorUrl = $errorUrl.'&nameEmpty';
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
	$set = 'title = :t, resume = :r';
	$content = array(
			':t' => $_POST['name'],
			':r' => $_POST['website'],
			':i' => $_POST['id']);

	if($_FILES['visuel']['size'] > 0){
		
		$partenaire = $mysql->prepare('SELECT imgTexte FROM contenus WHERE id = :i');
		$partenaire->execute(array(':i' => $_POST['id']));

		$data = $partenaire->fetch();

		if(file_exists('../'.$data['imgTexte'])){
			unlink('../'.$data['imgTexte']);
		}
		
        $nbre = rand(0, 100);
        $nom = 'img/partenaires/logo-'.$_POST['id'].'-'.$nbre.'.'.$extension_minuscule;
		$set .= ', imgTexte = :v';
		$content[':v'] = $nom;

		move_uploaded_file($_FILES['visuel']['tmp_name'], '../'.$nom);

	}	

	$modif = $mysql->prepare('UPDATE contenus SET '.$set.' WHERE id = :i');
	$modif->execute($content);

	header('Location: ../back/partenaire.php?id='.$_POST['id'].'&contentEdited');
}
