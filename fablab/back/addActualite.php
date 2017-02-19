<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Ajout d'une actualité</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Équipements > Ajouter une actualité</h1>
			</div>
			<div class="l-col-12 m-col-12">
				<form action="../traitement/addActualite.php" method="POST" enctype="multipart/form-data">
					
					<h2>Nom de l'actualité :</h2>
					<input type="text" name="name" placeholder="Nom de l'actualité (100 caractères max)" value="<?php if(!empty($_GET['title'])) echo $_GET['title']; ?>" maxlength="100">
					
					<h2>Chapeau :</h2>
					<textarea type="text" name="chapeau" placeholder="Chapeau (250 caractères max)" maxlength="250"><?php if(!empty($_GET['lead'])) echo $_GET['lead']; ?></textarea>

					<h2>Contenu :</h2>
					<textarea name="content" placeholder="Contenu de l'article"><?php if(!empty($_GET['resume'])) echo $_GET['resume']; ?></textarea>
					
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
						<button type="submit" value="Envoyer">Envoyer</button>
					</div>
				</form>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>