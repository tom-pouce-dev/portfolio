<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
		exit();
	}

	if( empty($_GET['id'])){
		header('Location: index.php');
		exit();
	}

	$activite = $mysql->prepare('SELECT * FROM contenus WHERE id = :i');
	$activite->execute(array(':i' => $_GET['id']));

	if($activite->rowCount() == 0){
		header('Location: ../404.php');
		exit();
	}else{
		$data = $activite->fetch();
	}

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - <?php echo $data['title']; ?></title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Activités > <?php echo $data['title']; ?></h1>
			</div>
			<div class="row">
				<div class="l-col-4 m-col-4">
					<h2>Image :</h2>
					<img src="<?php echo couverture($data['imgBandeau'], true); ?>" alt="Nom de l'article : <?php echo $data['title']; ?>">
				</div>
				<div class="l-col-8 m-col-8">
					<h2>Titre :</h2>
					<p><?php echo $data['title']; ?></p>
					
					<h2>Contenu : </h2>
					<p><?php echo $data['resume']; ?></p>
					
					<a class="edit" href="editActivite.php?id=<?php echo $data['id']; ?>">Modifier</a>
					<a class="delete" href="../traitement/deleteActivite.php?id=<?php echo $data['id']; ?>">Supprimer</a>
				</div>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>