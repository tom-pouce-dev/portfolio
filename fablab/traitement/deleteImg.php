<?php

include('../config/settings.php');

if ( empty($_SESSION['user']) ) {
	header('Location: ../back/logIn.php');
	exit();
}

if (empty($_POST)){
	header('Location: ../back/galerie.php');
	exit();
}

$error = false;
$errorUrl = '../back/editAlb.php?id='.$_POST['id'];

if(!empty($_POST['selection'])) {
	$checked_count = count($_POST['selection']);
	foreach($_POST['selection'] as $selected) {
		if(file_exists('../'.$selected)){
			unlink('../'.$selected);
		}
		$delete = $mysql->prepare('DELETE FROM albumdetail WHERE picture = :p');
		$delete->execute(array(':p' =>$selected));
		
		$dossier = '../img/galerie/album-'.$_POST['id'];
	
		EtatDuRepertoire($dossier);
		
		header('Location: ../back/editAlb.php?id='.$_POST['id'].'&imgDeleted');
	}
}else{
	$errorUrl = $errorUrl.'&selectImg';
	header('Location: '.$errorUrl);
}



