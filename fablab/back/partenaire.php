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

	$partenaire = $mysql->prepare('SELECT * FROM contenus WHERE id = :i');
	$partenaire->execute(array(':i' => $_GET['id']));

	if($partenaire->rowCount() == 0){
		header('Location: ../404.php');
		exit();
	}else{
		$data = $partenaire->fetch();
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
				<h1>Partenaires > <?php echo $data['title']; ?></h1>
			</div>
			<div class="row">
				<div class="l-col-4 m-col-4">
					<h2>Logo :</h2>
					<img src="<?php echo couverture($data['imgTexte'], true); ?>" alt="Nom du partenaire : <?php echo $data['title']; ?>">
				</div>
				<div class="l-col-8 m-col-8">
					<h2>Nom du partenaire :</h2>
					<p><?php echo $data['title']; ?></p>
					
					<h2>Lien vers son site :</h2>
					<p><?php if(empty($data['resume'])) { echo '<span class="alert">(Aucun lien indiqué)</span>'; }else{ echo $data['resume']; } ?></p>

					<div class="btn">
						<a class="edit" href="editPartenaire.php?id=<?php echo $data['id']; ?>">Modifier</a>
						<a class="delete" href="../traitement/deletePartenaire.php?id=<?php echo $data['id']; ?>">Supprimer</a>
					</div>
				</div>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>