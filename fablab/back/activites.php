<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

	$contenus = $mysql->prepare('SELECT * FROM contenus WHERE categorie = :c');
    $contenus->execute(array(':c' => 'activites'));

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Les activités</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Liste des équipements</h1>
				<a class="edit" href="addActivite.php">Ajouter une activité</a>
				<a class="edit" href="intro.php">Modifier l'entête de la page</a>
			</div>
			<div class="l-col-12 m-col-12">
				<form action="../traitement/editActivite.php" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
							<th>Nom de l'activité</th>
							<th>Actions</th>
						</tr>
						<?php
							while($data = $contenus->fetch()) {
						?>
						<tr>
							<td>
								<a href="activite.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a>
							</td>
							<td>
								<a class="edit" href="editActivite.php?id=<?php echo $data['id']; ?>">Modifier</a> | <a class="delete" href="../traitement/deleteActivite.php?id=<?php echo $data['id']; ?>">Supprimer</a>
							</td>
						</tr>
						<?php } ?>
					</table>
				</form>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>