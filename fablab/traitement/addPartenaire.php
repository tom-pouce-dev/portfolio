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
	
	//on renvoi vers la page d'ajout'
	header('Location: ../back/addPartenaire.php');
	exit();

}

//on initialise les variables d'erreur et de retour
$error = false;
$errorUrl = '../back/addPartenaire.php?';

//si le titre est vide
if(empty($_POST['name'])){
	$error = true;
	$errorUrl = $errorUrl.'&nameEmpty'.'&website='.$_POST['website'];
}else{
	$errorUrl = $errorUrl.'&title='.$_POST['name'].'&website='.$_POST['website'];
}

//si on a reçu un fichier et qu'il y a une erreur
if($_FILES['visuel']['size'] > 0 && $_FILES['visuel']['error'] > 0){
	
	//on change les var d'erreurs
	$error = true;
	$errorUrl = $errorUrl.'&fileError';
}

//---------------------------------------------------------------
//si on a reçu un fichier
if($_FILES['visuel']['size'] > 0){

	//on test si on a la bonne extension
	$extensions_valides = array('png', 'jpg', 'jpeg', 'gif');

	//on recupere le nom d'origine du fichier
	$nomDuFichier = $_FILES['visuel']['name'];

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
}else{
    $error = true;
    $errorUrl = $errorUrl.'&logoEmpty';
}

//si on a reçu un fichier et qu'il y a une erreur
if($_FILES['visuel']['size'] > 1048576) {
	
	//on change les var d'erreurs
	$error = true;
	$errorUrl = $errorUrl.'&maxSize';
}

//si il y a une erreur, on redirige
if($error){
	/*$errorUrl = $errorUrl.'&machine='.$_POST['machine'].'&fiche='.$_POST['fiche'];*/
	header('Location: '.$errorUrl);
	exit();

}else{ //on ajoute dans la base

	//on initialise les variables qui nous permettent de construire la requete avec le titre, l'auteur, le format et l'id de la personne connectee
	$cols = 'title, categorie, resume, created_by';
	$values = ':t, :c, :r, :i';
	$content= array(	':t' => $_POST['name'],
						':c' => 'partenaires',
						':r' => $_POST['website'],
						':i' => $_SESSION['id']);

	//on prepare et on execute la variable de requete
	$ajout = $mysql->prepare('INSERT INTO contenus ('.$cols.') VALUES ('.$values.')');
	$ajout->execute($content);

	//on recupere l'id ajoute automatiquement
	$id = $mysql->lastInsertId();

	if($_FILES['visuel']['size'] > 0){

        $nbre = rand(0, 100);
		//on construit le nouveau nom du fichier
		$nom = 'img/partenaires/logo-'.$id.'-'.$nbre.'.'.$extension_minuscule;

		//on déplace le fichier temporaire vers le dossier data avec le nouveau nom
		move_uploaded_file($_FILES['visuel']['tmp_name'], '../'.$nom);

		//on modifie la ligne dans la base de données
		$modif = $mysql->prepare('UPDATE contenus SET imgTexte = :c WHERE id = :i');
		$modif->execute(array(':c' => $nom, ':i' => $id));
	}
	//on redirige vers la fiche de la machine avec un message de confirmation
	header('Location: ../back/partenaire.php?id='.$id.'&partenaireAdded');

}
