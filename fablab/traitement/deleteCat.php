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

$delete = $mysql->prepare('DELETE FROM albumcategorie WHERE id = :i');
$delete->execute(array(':i' =>$_GET['id']));

header('Location: ../back/galerie.php?catDeleted');
