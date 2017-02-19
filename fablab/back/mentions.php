<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

	$mentions = $mysql->prepare('SELECT * FROM page WHERE categorie = :c');
  	$mentions->execute(array(':c' => 'mentions'));

  	$data = $mentions->fetch();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Mentions légales</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Page mentions légales</h1>
			</div>
			<div class="l-col-12 m-col-12">
				<form action="../traitement/editMentions.php" method="POST">
					<h2>Mentions légales</h2>
					<textarea type="text" name="texte" placeholder="Mentions légales"><?php echo nl2Delete($data['intro']); ?></textarea>
					<div class="btn">
						<button type="submit" value="Valider">Valider</button>
					</div>
				</form>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>