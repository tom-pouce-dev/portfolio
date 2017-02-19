<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Ajout d'un partenaire</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Partenaires > Ajouter un partenaire</h1>
			</div>
			<div class="l-col-12 m-col-12">
				<form action="../traitement/addPartenaire.php" method="POST" enctype="multipart/form-data">
					
					<h2>Nom du partenaire :</h2>
					<input type="text" name="name" placeholder="Nom du partenaire (100 caractères max)" value="<?php if(!empty($_GET['title'])) echo $_GET['title']; ?>" maxlength="100">
					
					<h2>Lien vers son site internet : <span class="alert">(n'oubliez pas de mettre "http://")</span></h2>
					<input type="text" name="website" placeholder="Lien vers son site internet" value="<?php if(!empty($_GET['website'])) echo $_GET['website']; ?>">
					
					<h2>Logo :</h2>
					<input type="hidden" name="MAX_FILES_SIZE" value="1048576"> 
					<input type="file" name="visuel">
					
					<div class="row">
					<p>(1Mo max, format autorisé : jpg, jpeg, png, gif // png recommandé)</p>
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