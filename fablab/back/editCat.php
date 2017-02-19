<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
		exit();
	}

	if( empty($_GET['id'])){
		header('Location: galerie.php');
		exit();
	}

	$cat = $mysql->prepare('SELECT * FROM albumcategorie WHERE id = :i');
	$cat->execute(array(':i' => $_GET['id']));

	if($cat->rowCount() == 0){
		header('Location: ../404.php');
		exit();
	}else{
		$data = $cat->fetch();
	}

	$album = $mysql->prepare('SELECT * FROM albumsphotos JOIN albumcategorie ON albumsphotos.cat = albumcategorie.categorie WHERE albumcategorie.id = :j');
	$album->execute(array( ':j' => $_GET['id']));
	
?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Modification de la catégorie : <?php echo $data['nomCategorie']; ?></title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Galerie > Catégories > Modification de : <?php echo $data['nomCategorie']; ?></h1>
			</div>
			<div class="l-col-6 m-col-6">
				<form action="../traitement/editCat.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
					
					<h2>Nom de la catégorie :</h2>
					<input type="text" name="nameCat" placeholder="Nom de la catégorie (25 caractères max)" value="<?php echo $data['nomCategorie']; ?>" maxlength="25">

					<div class="btn">
						<button type="submit" value="Valider">Valider</button>
						<?php if($album->rowCount() == 0) { ?>
							<a class="delete" href="../traitement/deleteCat.php?id=<?php echo $data['id']; ?>">Supprimer</a>
						<?php } ?>
					</div>
				</form>
			</div>
			<?php if($album->rowCount() != 0) { ?>
			<div class="l-col-12 m-col-12">
				<h1>Galerie > Catégories > Liste des albums de la catégorie : <?php echo $data['nomCategorie']; ?></h1>
			</div>
			<div class="l-col-12 m-col-12">
				<form>
					<h2>Liste des albums</h2>
					<table>
						<tr>
							<th>Nom de l'album</th>
						</tr>
						<?php
							while($dataB = $album->fetch()) { 
						?>
						<tr>
							<td>
								<?php echo $dataB['name_album']; ?>
							</td>
						</tr>
						<?php } ?>
					</table><br/>
				</form>
			</div>
			<?php } ?>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>