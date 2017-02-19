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

	$actualite = $mysql->prepare('SELECT * FROM contenus WHERE id = :i');
	$actualite->execute(array( ':i' => $_GET['id']));

	if($actualite->rowCount() == 0){
		header('Location: ../404.php');
		exit();
	}else{
		$data = $actualite->fetch();
	}

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Modification de <?php echo $data['title']; ?></title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Actualités > Modification de l'article : <?php echo $data['title']; ?></h1>
			</div>
			<div class="l-col-12 m-col-12 imgBand">
				<h2>Image au dessus de l'article :</h2>
				<img src="<?php echo couverture($data['imgBandeau'], true); ?>" alt="">
			</div>
			<div class="l-col-4 m-col-4">
				<h2>Image dans l'article :</h2>
				<img src="<?php echo couverture($data['imgTexte'], true); ?>" alt="">
			</div>
			<div class="l-col-8 m-col-8">
				<form action="../traitement/editActualite.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
					
					<h2>Nom de l'actualité :</h2>
					<input type="text" name="name" placeholder="Nom de l'actualité (100 caractères max)" value="<?php echo $data['title']; ?>" maxlength="100">

					<h2>Chapeau :</h2>
					<textarea type="text" name="chapeau" placeholder="Chapeau (250 caractères max)" maxlength="250"><?php echo nl2Delete($data['lead']); ?></textarea>
					
					<h2>Contenu :</h2>
					<textarea type="text" name="content" placeholder="Description"><?php echo nl2Delete($data['resume']); ?></textarea>
					
					<h2>Image au dessus de l'article :</h2>
					<input type="hidden" name="MAX_FILES_SIZE" value="1048576"> 
					<input type="file" name="visuel">
					
					<h2>Image dans l'article :</h2>
					<input type="hidden" name="MAX_FILES_SIZE" value="1048576"> 
					<input type="file" name="visuel2">

					<div class="row">
					<p>(1Mo max, format autorisé : jpg, jpeg, png, gif // jpg recommandé)</p>
					</div>
					<div class="row">
						<button type="submit" value="Valider">Valider</button>
					</div>
				</form>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>