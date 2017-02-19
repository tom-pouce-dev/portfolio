<?php

include('../config/settings.php');

if ( empty($_SESSION['user']) ) {
	header('Location: ../back/logIn.php');
	exit();
}

if (empty($_GET['id'])){
	header('Location: ../back/index.php');
	exit();
}
$imgTexte = $mysql->prepare('SELECT imgTexte FROM contenus WHERE id = :i');
$imgTexte->execute(array('i' => $_GET['id']));

$data = $imgTexte->fetch();

if(!empty($data['imgTexte']) && file_exists('../'.$data['imgTexte'])){
	unlink('../'.$data['imgTexte']);
}
$delete = $mysql->prepare('DELETE FROM contenus WHERE id = :i');
$delete->execute(array(':i' =>$_GET['id']));

header('Location: ../back/equipements.php?equipementDeleted');