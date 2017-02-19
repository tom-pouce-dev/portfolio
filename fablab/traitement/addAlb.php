<?php

include('../config/settings.php');

if ( empty($_SESSION['user']) ) {

	header('Location: ../back/logIn.php');
	exit();
}

if( empty($_POST) ){
	
	header('Location: ../back/galerie.php');
	exit();

}

$error = false;
$errorUrl = '../back/galerie.php?';

if(empty($_POST['album'])){
	$error = true;
	$errorUrl = $errorUrl.'&albEmpty';
}else{
	$errorUrl = $errorUrl.'&alb='.$_POST['album'];
}


if($error){
	header('Location: '.$errorUrl);
	exit();

}else{ 
	
	$cols = 'name_album, cat';
	$values = ':n, :c';
	$content= array(	':n' => $_POST['album'],
						':c' => $_POST['newCat']);

	$ajout = $mysql->prepare('INSERT INTO albumsphotos ('.$cols.') VALUES ('.$values.')');
	$ajout->execute($content);

	header('Location: ../back/galerie.php?id='.$id.'&catAdded');

}
