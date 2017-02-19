<?php 
    include('config/settings.php');
?><!DOCTYPE html>
<html lang="fr">
<head>
	<title>Antoine Barilt - Oops, erreur 404</title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="catscat">
	<main>
		<div class="row">
			<div class="l-col-4 l-offset-4 m-col-6 m-offset-3 s-col-8 s-offset-2">
				<figure>
					<img src="data/404.svg" alt="">
				</figure>
			</div>
			<div class="l-col-12">
				<h1>erreur 404</h1>
				<h1>cette page n'existe pas</h1>
				<a class="btn" href="back/index.php">Retour au back office</a>
			</div>
		</div>
	</main>
</body>
</html>