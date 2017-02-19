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
	header('Location: ../back/galerie.php');
	exit();

}

//on initialise les variables d'erreur et de retour
$error = false;
$errorUrl = '../back/galerie.php?';

//si le titre est vide
if(empty($_POST['categorie'])){
	$error = true;
	$errorUrl = $errorUrl.'&catEmpty';
}else{
	$errorUrl = $errorUrl.'&cat='.$_POST['categorie'];
}


//si il y a une erreur, on redirige
if($error){
	header('Location: '.$errorUrl);
	exit();

}else{ //on ajoute dans la base
	
	$last = $_POST['lastiD'] + 1;
	//on initialise les variables qui nous permettent de construire la requete avec le titre, l'auteur, le format et l'id de la personne connectee
	$cols = 'nomCategorie, categorie';
	$values = ':nC, :c';
	$content= array(	':nC' => $_POST['categorie'],
						':c' => 'cat'.$last);

	//on prepare et on execute la variable de requete
	$ajout = $mysql->prepare('INSERT INTO albumcategorie ('.$cols.') VALUES ('.$values.')');
	$ajout->execute($content);

	//on redirige vers la fiche de la machine avec un message de confirmation
	header('Location: ../back/galerie.php?id='.$id.'&catAdded');

}
