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
$image = $mysql->prepare('SELECT description FROM albumsphotos WHERE id = :i');
$image->execute(array('i' => $_GET['id']));

$data = $image->fetch();

if(!empty($data['description']) && file_exists('../'.$data['description'])){
	unlink('../'.$data['description']);
}

//on supprime la ligne dans la base de données
$delete = $mysql->prepare('DELETE FROM albumsphotos WHERE id = :i');
$delete->execute(array(':i' =>$_GET['id']));

//on redirige vers l'accueil avec un message
header('Location: ../back/galerie.php?albDeleted');
