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
$errorUrl = '../back/editActualite.php?id='.$_POST['id'];

if(empty($_POST['name'])){
	$error = true;
	$errorUrl = $errorUrl.'&titleEmpty';
}else{
	$errorUrl = $errorUrl.'&title='.$_POST['name'];
}

if(empty($_POST['chapeau'])){
	$error = true;
	$errorUrl = $errorUrl.'&leadEmpty';
}else{
	$errorUrl = $errorUrl.'&lead='.urlencode($_POST['chapeau']);
}

if(empty($_POST['content'])){
	$error = true;
	$errorUrl = $errorUrl.'&contentEmpty';
}else{
	$errorUrl = $errorUrl.'&resume='.urlencode($_POST['content']);
}

if($_FILES['visuel']['size'] > 0 && $_FILES['visuel']['error'] > 0){
	$error = true;
	$errorUrl = $errorUrl.'&fileError';
}

if($_FILES['visuel2']['size'] > 0 && $_FILES['visuel2']['error'] > 0){
	$error = true;
	$errorUrl = $errorUrl.'&fileError';
}

if($_FILES['visuel']['size'] > 1048576) {
	$error = true;
	$errorUrl = $errorUrl.'&maxSize';
}

if($_FILES['visuel2']['size'] > 1048576) {
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

if($_FILES['visuel2']['size'] > 0){

	$extensions_valides = array('png', 'jpg', 'jpeg', 'gif');

	$nomDuFichier = $_FILES['visuel2']['name'];

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
	$set = 'title = :t, resume = :r, lead = :l';
	$content = array(
			':t' => $_POST['name'],
			':r' => nl2br($_POST['content']),
			':l' => nl2br($_POST['chapeau']),
			':i' => $_POST['id']);

	if($_FILES['visuel']['size'] > 0){
		
		$actualite = $mysql->prepare('SELECT imgBandeau FROM contenus WHERE id = :i');
		$actualite->execute(array(':i' => $_POST['id']));

		$data = $actualite->fetch();

		if(file_exists('../'.$data['imgBandeau'])){
			unlink('../'.$data['imgBandeau']);
		}
		
        $nbre = rand(0, 100);
        $nom = 'img/news/img-'.$_POST['id'].'-'.$nbre.'.'.$extension_minuscule;
		$set .= ', imgBandeau = :v';
		$content[':v'] = $nom;

		move_uploaded_file($_FILES['visuel']['tmp_name'], '../'.$nom);

	}
	
	if($_FILES['visuel2']['size'] > 0){
		
		$actualite = $mysql->prepare('SELECT imgTexte FROM contenus WHERE id = :i');
		$actualite->execute(array(':i' => $_POST['id']));

		$data = $actualite->fetch();

		if(file_exists('../'.$data['imgTexte'])){
			unlink('../'.$data['imgTexte']);
		}
		
        $nbre2 = rand(0, 100);
        $nom = 'img/news/img2-'.$_POST['id'].'-'.$nbre2.'.'.$extension_minuscule;
		$set .= ', imgTexte = :w';
		$content[':w'] = $nom;

		move_uploaded_file($_FILES['visuel2']['tmp_name'], '../'.$nom);
	}

	$modif = $mysql->prepare('UPDATE contenus SET '.$set.' WHERE id = :i');
	$modif->execute($content);

	header('Location: ../back/actualite.php?id='.$_POST['id'].'&contentEdited');
}
