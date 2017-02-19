<?php

//on importe la config
include('../config/settings.php');

//si l'utilisateur n'est pas connecte
if ( empty($_SESSION['user']) ) {

	//on renvoie vers la page de connexion
	header('Location: ../back/logIn.php');
	exit();
}

//si il n'y a pas id dans l'url 
if (empty($_GET['id'])){


	//on renvoie vers la page d'accueil
	header('Location: ../back/index.php');
	exit();

}
//on recupere le nom de l'image
$activite = $mysql->prepare('SELECT imgBandeau FROM contenus WHERE id = :i');
$activite->execute(array('i' => $_GET['id']));

$data = $activite->fetch();

if(file_exists('../'.$data['imgBandeau'])){
//on supprime la couverture du dossier data (on supprime l'image)
	unlink('../'.$data['imgBandeau']);

}
//on supprime la ligne dans la base de données
$delete = $mysql->prepare('DELETE FROM contenus WHERE id = :i');
$delete->execute(array(':i' =>$_GET['id']));

//on redirige vers l'accueil avec un message
header('Location: ../back/activites.php?activiteDeleted');
