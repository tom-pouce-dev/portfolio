<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

	$contact = $mysql->prepare('SELECT * FROM contact');
  	$contact->execute();

  	$data = $contact->fetch();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Contact</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Page contact</h1>
			</div>
			<div class="l-col-12 m-col-12">
				<form action="../traitement/editContact.php" method="POST">
					<h2>Adresse</h2>
					<textarea type="text" name="adress" placeholder="L'adresse (100 caractères max)" maxlength="100"><?php echo nl2Delete($data['adress']); ?></textarea>

					<h2>Téléphone</h2>
					<textarea type="text" name="phone" placeholder="Numéro de téléphone (20 caractères max)" maxlength="20"><?php echo nl2Delete($data['phone']); ?></textarea>
					
					<h2>Horaires</h2>
					<textarea type="text" name="open" placeholder="Horaires (50 caractères max)" maxlength="50"><?php echo nl2Delete($data['opened']); ?></textarea>
					<div class="btn">
						<button type="submit" value="Valider">Valider</button>
					</div>
				</form>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>