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

	$album = $mysql->prepare('SELECT * FROM albumsphotos WHERE id = :i');
	$album->execute( array( ':i' => $_GET['id']) );

	if($album->rowCount() == 0){
		header('Location: ../404.php');
		exit();
	}else{
		$data = $album->fetch();
	}

	$list = $mysql->prepare('SELECT * FROM albumsphotos JOIN albumdetail ON albumsphotos.id = albumdetail.id_album WHERE id_album = :j');
	$list->execute(array( ':j' => $_GET['id']));

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Modification de l'album : <?php echo $data['name_album']; ?></title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Galerie > Modification de l'album : <?php echo $data['name_album']; ?></h1>
			</div>
			<div class="row">
				<div class="l-col-6 m-col-6 imgBand">
					<h2>Image d'aperçu :</h2>
					<img src="<?php echo couverture($data['description'], true); ?>" alt="">
				</div>
				<div class="l-col-6 m-col-6">
					<form action="../traitement/editApercuAlb.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $data['id'];?>">
						<h2>Nom de l'album :</h2>
						<input type="text" name="name" placeholder="Nom de l'album (50 caractères max)" value="<?php echo $data['name_album']; ?>" maxlength="50">
					
						<h2>Modification de l'aperçu :</h2>
						<input type="hidden" name="MAX_FILES_SIZE" value="1048576">
						<input type="file" name="visuel">
						<p>(1Mo max, format autorisé : jpg, jpeg, png, gif // jpg recommandé)</p>
						
						<button type="submit" value="Valider">Valider</button>
						<?php if($list->rowCount() == 0) { ?><a class="delete" href="../traitement/deleteAlb.php?id=<?php echo $data['id']; ?>">Supprimer l'album</a><?php } ?>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="l-col-12 m-col-12 nogutters">
					<form action="../traitement/deleteImg.php" method="POST">
						<input type="hidden" name="id" value="<?php echo $data['id'];?>">
						<?php if($list->rowCount() != 0) { ?>
							<h2 class="l-col-12 m-col-12">Liste des images de l'album :</h2>
							<?php while($dataB = $list->fetch()) { ?>
								<figure class="l-col-2 m-col-2 center">
									<img src="<?php echo couverture($dataB['picture'], true); ?>" alt="">
									<input type="checkbox" name="selection[]" value="<?php echo $dataB['picture']; ?>">
								</figure>
							<?php } ?>
							<div class="row">
								<div class="btn l-col-12 m-col-12">
									<button type="submit" value="Supprimer les images sélectionnées" class="del">Supprimer les images sélectionnées</button>
								</div>
							</div>
						<?php }else{ ?>
							<h2 class="l-col-12 m-col-12 alert">L'album ne contient aucune images.</h2>
						<?php } ?>
					</form>
					<form action="../traitement/addImg.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
						<div class="row">
							<div class="l-col-6 m-col-6 gutters">
								<h2>Ajout d'images :</h2>
								<input type="hidden" name="MAX_FILES_SIZE" value="1048576"> 
								<input type="file" name="visuel2">
							</div>
							<div class="l-col-6 m-col-6">
                                <h2>Description pour chaque image :</h2>
							    <input type="text" name="fig1" placeholder="Description image 1 (75 caractères max)" maxlength="75">
							</div>
						</div>
						<div class="row">
							<div class="l-col-6 m-col-6 btn gutters">
								<input type="hidden" name="MAX_FILES_SIZE" value="1048576"> 
								<input type="file" name="visuel3">
								<p>(1Mo max, format autorisé : jpg, jpeg, png, gif // jpg recommandé)</p>
							</div>
							<div class="l-col-6 m-col-6 btn"><input type="text" name="fig2" placeholder="Description image 2 (75 caractères max)" maxlength="75"></div>
						</div>				
						<div class="l-col-12 m-col-12">
							<button type="submit" value="Valider">Valider</button>
						</div>
						
					</form>
				</div>
			</div>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>