<?php
// Script de traitement du addBook

//on importe la config
include('../config/settings.php');


//si l'utilisateur n'est pas connecte
if( empty($_SESSION['user']) ){
	
	//on renvoi vers la page de connexion
	header('Location: ../back/logIn.php');
	exit();
}

//si on arrive sur cette page sans passer par le formulaire
if( empty($_POST) ){
	
	//on renvoi vers la page d'ajout
	header('Location: ../back/account.php');
	exit();
}



//on initialise les variables d'erreur et de retour
$error = false;
$errorUrl = '../back/account.php?';

//si le pseudo est vide
if(empty($_POST['pseudo'])){
	$error = true;
	$errorUrl = $errorUrl.'&pseudoEmpty';
}else{
	$errorUrl = $errorUrl.'&pseudo='.$_POST['pseudo'];
}

//si le password est vide
if(empty($_POST['passworbd'])){
	$error = true;
	$errorUrl = $errorUrl.'&passworbdEmpty';
}


//on verifie qu'il n'existe pas deja un utilisateur avec ce pseudo
$verif = $mysql->prepare('SELECT * FROM users WHERE pseudo = :p ');
$verif->execute(array(':p' => $_POST['pseudo']));

//s'il y a au moins une ligne trouvee, on declenche une erreur
if( $verif->rowCount() > 0){
	$error = true;
	$errorUrl = $errorUrl.'&existingUser';
}



//s'il y a eu une erreur, on redirige
if($error){
	header('Location: '.$errorUrl);
	exit();

}else{ //on ajoute dans la base

	//on prepare et execute la requete

	$ajout = $mysql->prepare('INSERT INTO users (pseudo, password) VALUES ( :ps, :pass)');
	$ajout->execute(array( ':ps' => $_POST['pseudo'],
							':pass' => crypte($_POST['passworbd']))
	);


	//on recupere l'id ajoute automatiquement
	$id = $mysql->lastInsertId();


	//on redirige vers la fiche du livre avec un message de confirmation
	header('Location: ../back/account.php?id='.$id.'&userAdded');

}