<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

	$contenus = $mysql->prepare('SELECT * FROM contenus WHERE (categorie = "actu" || categorie = "tuto") ORDER BY created_at DESC');
    $contenus->execute();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Les actualités</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Liste des actualités</h1>
				<a class="edit" href="addActualite.php">Ajouter une actualité</a>
			</div>
			<div class="l-col-12 m-col-12">
				<form action="../traitement/editActualite.php" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
							<th>Nom de l'actualité</th>
							<th>Actions</th>
						</tr>
						<?php
							//on lit les resultats les uns apres les autres
							while($data = $contenus->fetch()) {
						?>
						<tr>
							<td>
								<a href="actualite.php?id=<?php echo $data['id']; ?>"><?php echo $data['title']; ?></a>
							</td>
							<td>
								<a class="edit" href="editActualite.php?id=<?php echo $data['id']; ?>">Modifier</a><?php if($data['categorie'] != 'tuto') { ?> | <a class="delete" href="../traitement/deleteActualite.php?id=<?php echo $data['id']; ?>">Supprimer</a><?php } ?>
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