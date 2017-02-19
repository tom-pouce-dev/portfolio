<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

	$intro1 = $mysql->prepare('SELECT * FROM page WHERE categorie = :a');
  	$intro1->execute(array(':a' => 'activites'));
  	$data = $intro1->fetch();

	$intro2 = $mysql->prepare('SELECT * FROM page WHERE categorie = :d');
  	$intro2->execute(array(':d' => '3dhubs'));
  	$data2 = $intro2->fetch();

	$intro3 = $mysql->prepare('SELECT * FROM page WHERE categorie = :g');
  	$intro3->execute(array(':g' => 'galerie'));
  	$data3 = $intro3->fetch();

	$intro9 = $mysql->prepare('SELECT * FROM page WHERE categorie = :s');
  	$intro9->execute(array(':s' => 'slash'));
  	$data9 = $intro9->fetch();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - En-têtes des pages activités, 3dhubs et galerie</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Modification des en-têtes Activités / 3DHubs / Galerie / 3D Slash</h1>
			</div>
			<div class="l-col-12 m-col-12">
				<form action="../traitement/editIntro.php" method="POST">
					<h2>Activités</h2>
					<textarea type="text" name="act" placeholder="Entête de la page activités"><?php echo nl2Delete($data['intro']); ?></textarea>

					<h2>3DHubs / Équipements</h2>
					<textarea type="text" name="dhu" placeholder="Entête de la page 3DHubs / Équipements"><?php echo nl2Delete($data2['intro']); ?></textarea>
					
					<h2>Galerie</h2>
					<textarea type="text" name="gal" placeholder="Entête de la page galerie"><?php echo nl2Delete($data3['intro']); ?></textarea>
					
					<h2>3D Slash</h2>
					<textarea type="text" name="sla" placeholder="Entête de la page 3D Slash"><?php echo nl2Delete($data9['intro']); ?></textarea>
					
					<div class="btn">
						<button type="submit" value="Valider">Valider</button>
					</div>
				</form>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>