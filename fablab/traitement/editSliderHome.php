<?php 

include('../config/settings.php');

if( empty($_SESSION['user'])){
    header('Location: ../back/index.php');
}

if(empty($_POST)){
    header('Location: ../back/index.php');
    exit();
}

$delete = $mysql->prepare('UPDATE contenus SET home = 0 WHERE id = :val');
$delete->execute(array(':val' => $_POST['oldSlider']));

$ajoutHome = $mysql->prepare('UPDATE contenus SET home = 1 WHERE id = :valu');
$ajoutHome->execute(array(':valu' => $_POST['newSlider']));

header('Location: ../back/index.php?homeUpdated');

   
