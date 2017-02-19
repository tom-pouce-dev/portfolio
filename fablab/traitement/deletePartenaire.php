<?php

include('../config/settings.php');

if (empty($_SESSION['user'])) {
	header('Location: ../back/logIn.php');
	exit();
}

if (empty($_GET['id'])) {
	header('Location: ../back/index.php');
	exit();
}
$partenaire = $mysql->prepare('SELECT imgTexte FROM contenus WHERE id = :i');
$partenaire->execute(array('i' => $_GET['id']));

$data = $partenaire->fetch();

if(file_exists('../'.$data['imgTexte'])) {
	unlink('../'.$data['imgTexte']);
}
$delete = $mysql->prepare('DELETE FROM contenus WHERE id = :i');
$delete->execute(array(':i' =>$_GET['id']));

header('Location: ../back/partenaires.php?partenaireDeleted');
