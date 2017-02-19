<?php
	include('../config/settings-locale.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

	$slider = $mysql->prepare('SELECT id, title, imgBandeau, categorie, home FROM contenus WHERE home != :i AND (categorie = :t || categorie = :a) ORDER BY id DESC');
	$slider->execute(array(':i' => '1',
						   ':t' => 'tuto',
						   ':a' => 'actu'));

	$actuel = $mysql->prepare('SELECT id, title, imgBandeau, categorie, home FROM contenus WHERE home = :h');
	$actuel->execute(array(':h' => '1'));

	$data = $actuel->fetch();

	$text1 = $mysql->prepare('SELECT * FROM home WHERE id = :w');
  	$text1->execute(array(':w' => '1'));
  	$dataW = $text1->fetch();

	$text2 = $mysql->prepare('SELECT * FROM home WHERE id = :x');
  	$text2->execute(array(':x' => '2'));
  	$dataX = $text2->fetch();

	$text3 = $mysql->prepare('SELECT * FROM home WHERE id = :y');
  	$text3->execute(array(':y' => '3'));
  	$dataY = $text3->fetch();

	$text4 = $mysql->prepare('SELECT * FROM home WHERE id = :z');
  	$text4->execute(array(':z' => '4'));
  	$dataZ = $text4->fetch();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Accueil</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Sélection de l'article principal</h1>
			</div>
			<form action="../traitement/editSliderHome.php" method="POST">
				<div class="l-col-12 m-col-12">
					<h2>Titre actuel :</h2>
					<p><?php echo $data['title']; ?></p>
					
					<h2>Image actuelle :</h2>
					<img src="<?php echo couverture($data['imgBandeau'], true); ?>" alt="">
					
					<h2>Sélectionner un nouvel article : </h2>
					<p>
						<select name="newSlider">
						<?php 
							while($slid = $slider->fetch()){
								echo '<option value="'.$slid['id'].'">'.$slid['title'].'</option>';
							}
						?>
						</select>
						<input type="hidden" name="oldSlider" value="<?php echo $data['id']; ?>">
					</p>
					<button type="submit" value="Valider">Valider</button>
				</div>
			</form>
			<div class="l-col-12 m-col-12">
				<h1>Modification de la partie : Que peut-on y faire ?</h1>
			</div>
			<form action="../traitement/editIndex.php" method="POST">
				<div class="l-col-6 m-col-12">
					<h2>1ère colonne :</h2>
					<input class="marg-b" type="text" name="titreW" placeholder="Titre de la première colonne" value="<?php echo $dataW['title']; ?>">
					<textarea type="text" name="textW" placeholder="Contenu de la première colonne"><?php echo nl2Delete($dataW['resume']); ?></textarea>
					
					<h2>3ème colonne :</h2>
					<input class="marg-b" type="text" name="titreY" placeholder="Titre de la troisième colonne" value="<?php echo $dataY['title']; ?>">
					<textarea type="text" name="textY" placeholder="Contenu de la troisième colonne"><?php echo nl2Delete($dataY['resume']); ?></textarea>
				</div>
				<div class="l-col-6 m-col-12">
					<h2>2ème colonne :</h2>
					<input class="marg-b" type="text" name="titreX" placeholder="Titre de la deuxième colonne" value="<?php echo $dataX['title']; ?>">
					<textarea type="text" name="textX" placeholder="Contenu de la deuxième colonne"><?php echo nl2Delete($dataX['resume']); ?></textarea>
					
					<h2>4ème colonne :</h2>
					<input class="marg-b" type="text" name="titreZ" placeholder="Titre de la quatrième colonne" value="<?php echo $dataZ['title']; ?>">
					<textarea type="text" name="textZ" placeholder="Contenu de la quatrième colonne"><?php echo nl2Delete($dataZ['resume']); ?></textarea>
				</div>
				<div class="l-col-12 m-col-12 btn">
					<button type="submit" value="Valider">Valider</button>
				</div>
			</form>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>