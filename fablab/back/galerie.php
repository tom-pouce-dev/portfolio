<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

	$albCat = $mysql->prepare('SELECT * FROM albumcategorie');
    $albCat->execute();

	$albCat2 = $mysql->prepare('SELECT id FROM albumcategorie ORDER BY id DESC LIMIT 1');
    $albCat2->execute();

	$data2 = $albCat2->fetch();

	$albCat3 = $mysql->prepare('SELECT * FROM albumcategorie');
    $albCat3->execute();

	$albPho = $mysql->prepare('SELECT * FROM albumsphotos');
    $albPho->execute();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Galerie photos</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Galerie Photos</h1>
			</div>
			<div class="l-col-12 m-col-12 marg-b">
				<a class="edit" href="intro.php">Modifier l'entête de la page</a>
			</div>
			<div class="row">
				<div class="l-col-12 m-col-12">
					<form>
						<h2>Liste des catégories</h2>
						<table>
							<tr>
								<th>Nom de la catégorie</th>
								<th>Actions</th>
							</tr>
							<?php
								while($data = $albCat->fetch()) {
							?>
							<tr>
								<td>
									<a href="editCat.php?id=<?php echo $data['id']; ?>"><?php echo $data['nomCategorie']; ?></a>
								</td>
								<td>
									<a class="edit" href="editCat.php?id=<?php echo $data['id']; ?>">Modifier</a>
								</td>
							</tr>
							<?php } ?>
						</table><br/>
					</form>
				</div>
				<div class="l-col-6 m-col-6">
					<form action="../traitement/addCat.php" method="POST">
						<h2>Ajouter une catégorie</h2>

						<input type="text" name="categorie" placeholder="Nom de la nouvelle catégorie (25 caractères max)" maxlength="25">
						<input type="hidden" name="lastiD" value="<?php echo $data2['id']; ?>">
						<div class="btn">
							<button type="submit" value="Valider">Valider</button>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="l-col-12 m-col-12">
					<form>
						<h2>Liste des albums</h2>
						<table>
							<tr>
								<th>Nom de l'album</th>
								<th>Actions</th>
							</tr>
							<?php
								while($data3 = $albPho->fetch()) {
							?>
							<tr>
								<td>
									<a href="editAlb.php?id=<?php echo $data3['id']; ?>"><?php echo $data3['name_album']; if(empty($data3['description'])) { ?><span class="alert"> (Veuillez rajouter une image d'aperçu)</span><?php } ?></a>
								</td><?php  ?>
								<td>
									<a class="edit" href="editAlb.php?id=<?php echo $data3['id']; ?>">Modifier</a>
								</td>
							</tr>
							<?php } ?>
						</table><br/>
					</form>
				</div>
				<div class="l-col-6 m-col-6">
					<form action="../traitement/addAlb.php" method="POST">
						<h2>Ajouter un album</h2>

						<input type="text" name="album" placeholder="Nom du nouvel album (50 caractères max)" maxlength="50"><br/><br/>
						<h3>Sélectionner une catégorie</h3><br/>
						<select name="newCat">
						<?php
							while($cate = $albCat3->fetch()) {
								echo '<option value="'.$cate['categorie'].'">'.$cate['nomCategorie'].'</option>';
							}
						?>
						</select>
						<div class="btn">
							<button type="submit" value="Valider">Valider</button>
						</div>
					</form>
				</div>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>