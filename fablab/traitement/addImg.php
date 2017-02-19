<?php
// Script de traitement du addBook

//on importe la config
include('../config/settings.php');

//si l'utilisateur n'est pas connecte
if ( empty($_SESSION['user']) ) {

	//on renvoie vers la page de connexion
	header('Location: ../back/logIn.php');
	exit();
}

//si on arrive sur cette page sans passer par le formulaire
if( empty($_POST) ){
	
	//on renvoi vers la page galerie
	header('Location: ../back/galerie.php');
	exit();

}

//on initialise les variables d'erreur et de retour
$error = false;
$errorUrl = '../back/editAlb.php?id='.$_POST['id'];

//si on a reçu un fichier et qu'il y a une erreur
if($_FILES['visuel2']['size'] > 0 && $_FILES['visuel2']['error'] > 0){
	
	//on change les var d'erreurs
	$error = true;
	$errorUrl = $errorUrl.'&fileError';
}

//si on a reçu un fichier et qu'il y a une erreur
if($_FILES['visuel3']['size'] > 0 && $_FILES['visuel3']['error'] > 0){
	
	//on change les var d'erreurs
	$error = true;
	$errorUrl = $errorUrl.'&fileError';
}

//---------------------------------------------------------------
//si on a reçu un fichier
if($_FILES['visuel2']['size'] > 0){

	//on test si on a la bonne extension
	$extensions_valides = array('png', 'jpg', 'jpeg', 'gif');

	//on recupere le nom d'origine du fichier
	$nomDuFichier = $_FILES['visuel2']['name'];

	//on decompose ce nom sous forme d'un tableau selon le motif .
	$patternDuFichier = explode('.', $nomDuFichier);

	//on recupere la derniere case de ce tableau c-a-d l'extension
	$extension_du_fichier = $patternDuFichier[ count($patternDuFichier) -1];

	//on transforme l'extension en minuscule
	$extension_minuscule = strtolower($extension_du_fichier);

	//si l'extension minuscule n'est pas dans le tableau des valides 
	if( !in_array($extension_minuscule, $extensions_valides) ){
		//alors on déclenche une erreur
		$error = true;
		$errorUrl = $errorUrl.'&extensionError';
	}
}

//---------------------------------------------------------------
//si on a reçu un fichier
if($_FILES['visuel3']['size'] > 0){

	//on test si on a la bonne extension
	$extensions_valides = array('png', 'jpg', 'jpeg', 'gif');

	//on recupere le nom d'origine du fichier
	$nomDuFichier = $_FILES['visuel3']['name'];

	//on decompose ce nom sous forme d'un tableau selon le motif .
	$patternDuFichier = explode('.', $nomDuFichier);

	//on recupere la derniere case de ce tableau c-a-d l'extension
	$extension_du_fichier = $patternDuFichier[ count($patternDuFichier) -1];

	//on transforme l'extension en minuscule
	$extension_minuscule = strtolower($extension_du_fichier);

	//si l'extension minuscule n'est pas dans le tableau des valides 
	if( !in_array($extension_minuscule, $extensions_valides) ){
		//alors on déclenche une erreur
		$error = true;
		$errorUrl = $errorUrl.'&extensionError';
	}
}

//si on a reçu un fichier et qu'il y a une erreur
if($_FILES['visuel']['size'] > 1048576) {
	
	//on change les var d'erreurs
	$error = true;
	$errorUrl = $errorUrl.'&maxSize';
}

//si on a reçu un fichier et qu'il y a une erreur
if($_FILES['visuel2']['size'] > 1048576) {
	
	//on change les var d'erreurs
	$error = true;
	$errorUrl = $errorUrl.'&maxSize';
}

//si on a reçu un fichier et qu'il y a une erreur
if($_FILES['visuel3']['size'] > 1048576) {
	
	//on change les var d'erreurs
	$error = true;
	$errorUrl = $errorUrl.'&maxSize';
}

//si il y a une erreur, on redirige
if($error){
	header('Location: '.$errorUrl);
	exit();

}else{ //on ajoute dans la base
	
	$id = $mysql->lastInsertId();
	
	$dossier = '../img/galerie/album-'.$_POST['id'];
	
	if(!is_dir($dossier)){
		mkdir($dossier);
	}

	if($_FILES['visuel2']['size'] > 0){
		
		$nbre = rand(0, 1000);
		//on construit le nouveau nom du fichier
		$nom = 'img/galerie/album-'.$_POST['id'].'/img-'.$id.$nbre.'.'.$extension_minuscule;
			
		$cols = 'id_album, picture, alt';
		$values = ':a, :p, :l';
		$content = array(	':a' => $_POST['id'],
							':p' => $nom,
                            ':l' => $_POST['fig1']);
		
		//on déplace le fichier temporaire vers le dossier data avec le nouveau nom
		move_uploaded_file($_FILES['visuel2']['tmp_name'], '../'.$nom);

		//on modifie la ligne dans la base de données
		$ajout = $mysql->prepare('INSERT INTO albumdetail ('.$cols.') VALUES ('.$values.')');
		$ajout->execute($content);
	}
	
	if($_FILES['visuel3']['size'] > 0){
		
		$nbre = rand(0, 1000);
		//on construit le nouveau nom du fichier
		$nom = 'img/galerie/album-'.$_POST['id'].'/img-'.$id.$nbre.'.'.$extension_minuscule;
			
		$cols = 'id_album, picture, alt';
		$values = ':a, :p, :l';
		$content = array(	':a' => $_POST['id'],
							':p' => $nom,
                            ':l' => $_POST['fig2']);
		
		//on déplace le fichier temporaire vers le dossier data avec le nouveau nom
		move_uploaded_file($_FILES['visuel3']['tmp_name'], '../'.$nom);

		//on modifie la ligne dans la base de données
		$ajout = $mysql->prepare('INSERT INTO albumdetail ('.$cols.') VALUES ('.$values.')');
		$ajout->execute($content);
	}

	//on redirige vers la fiche de la machine avec un message de confirmation
	header('Location: ../back/editAlb.php?id='.$_POST['id'].'&imgAdded');

}
