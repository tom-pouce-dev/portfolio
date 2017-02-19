<?php

include('../config/settings.php');

if ( empty($_SESSION['user']) ) {
	header('Location: ../back/logIn.php');
	exit();
}

if( empty($_POST) ){
	header('Location: ../back/addActivite.php');
	exit();
}

$error = false;
$errorUrl = '../back/addActivite.php?';

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

if($_FILES['visuel']['size'] > 1048576) {
	$error = true;
	$errorUrl = $errorUrl.'&maxSize';
}

//---------------------------------------------------------------
//si on a reçu un fichier
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
}else{
    $error = true;
    $errorUrl = $errorUrl.'&imageEmpty';
}

if($error){
	header('Location: '.$errorUrl);
	exit();

}else{

	$cols = 'title, resume, categorie, created_by';
	$values = ':t, :r, :c, :i';
	$content= array(	':t' => $_POST['name'],
						':c' => 'activites',
						':i' => $_SESSION['id'],
						':r' => nl2br($_POST['content']));

	$ajout = $mysql->prepare('INSERT INTO contenus ('.$cols.') VALUES ('.$values.')');
	$ajout->execute($content);

	$id = $mysql->lastInsertId();

	if($_FILES['visuel']['size'] > 0){

        $nbre = rand(0, 100);
		$nom = 'img/activites/img-'.$id.'-'.$nbre.'.'.$extension_minuscule;

		move_uploaded_file($_FILES['visuel']['tmp_name'], '../'.$nom);

		$modif = $mysql->prepare('UPDATE contenus SET imgBandeau = :c WHERE id = :i');
		$modif->execute(array(':c' => $nom, ':i' => $id));
	}
	header('Location: ../back/activite.php?id='.$id.'&activiteAdded');
}
