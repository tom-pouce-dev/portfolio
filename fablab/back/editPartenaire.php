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
	$activite->execute( array(':i' => $_GET['id']));

	if($activite->rowCount() == 0){
		header('Location: ../404.php');
		exit();
	}else{
		$data = $activite->fetch();
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
				<h1>Partenaires > Modification du partenaire : <?php echo $data['title']; ?></h1>
			</div>
			<div class="l-col-4 m-col-4">
				<h2>Logo :</h2>
				<img src="<?php echo couverture($data['imgTexte'], true); ?>" alt="">
			</div>
			<div class="l-col-8 m-col-8">
				<form action="../traitement/editPartenaire.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
					
					<h2>Nom du partenaire :</h2>
					<input type="text" name="name" placeholder="Nom du partenaire (100 caractères max)" value="<?php echo $data['title']; ?>" maxlength="100">
					
					<h2>Lien vers son site internet :</h2>
					<input type="text" name="website" placeholder="Lien vers son site internet (n'oubliez pas http://)" value="<?php echo $data['resume']; ?>">

					<h2>Image :</h2>
					<input type="hidden" name="MAX_FILES_SIZE" value="1048576"> 
					<input type="file" name="visuel">

					<div class="row">
					<p>(1Mo max, format autorisé : jpg, jpeg, png, gif // png recommandé)</p>
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