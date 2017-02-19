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
$errorUrl = '../back/editActivite.php?id='.$_POST['id'];

if(empty($_POST['name'])){
	$error = true;
	$errorUrl = $errorUrl.'&titleEmpty';
}else{
	$errorUrl = $errorUrl.'&title='.$_POST['name'];
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

if($_FILES['visuel']['size'] > 1048576) {
	$error = true;
	$errorUrl = $errorUrl.'&maxSize';
}

if($error){
	header('Location: '.$errorUrl);
	exit();
}else{ 
	$set = 'title = :t, resume = :r';
	$content = array(
			':t' => $_POST['name'],
			':r' => nl2br($_POST['content']),
			':i' => $_POST['id']);

	if($_FILES['visuel']['size'] > 0){	
		$activite = $mysql->prepare('SELECT imgBandeau FROM contenus WHERE id = :i');
		$activite->execute(array(':i' => $_POST['id']));

		$data = $activite->fetch();

		if(file_exists('../'.$data['imgBandeau'])){
			unlink('../'.$data['imgBandeau']);
		}
		
        $nbre = rand(0, 100);
        $nom = 'img/activites/img-'.$_POST['id'].'-'.$nbre.'.'.$extension_minuscule;
		$set .= ', imgBandeau = :v';
		$content[':v'] = $nom;
		
		move_uploaded_file($_FILES['visuel']['tmp_name'], '../'.$nom);
	}	

	$modif = $mysql->prepare('UPDATE contenus SET '.$set.' WHERE id = :i');
	$modif->execute($content);

	header('Location: ../back/activite.php?id='.$_POST['id'].'&contentEdited');
}
