<?php
	include('../config/settings.php');

	if( !empty($_SESSION['user'])){
		header('Location: index.php');
		exit();
	}

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Connexion au Back Office</title>
		<?php include('../include/headBack.php'); ?>
    </head>
    <body class="login">
		<div class="wrapper">
			<main class="container gutters">
				<section>
					<div class="row">
						<div class="l-col-2 l-offset-5 m-col-6 m-offset-3">
							<a href="../index.php"><img src="../data/logoBack.png"></a>
						</div>
					</div>
				</section>
				<section>
					<div class="row">
						<div class="l-col-4 l-offset-4 m-col-8 m-offset-2">
							<p>Bienvenue sur le back office</p>
						</div>
					</div>
					<div class="row">
						<div class="l-col-4 l-offset-4 m-col-8 m-offset-2">
							<form action="../traitement/logIn.php" method="POST">
								<p>
									<input class="texte" type="text" name="nom" placeholder="Pseudo">
								</p>
								<p>
									<input class="texte" type="password" name="motDePasse" placeholder="Mot de passe">
								</p>
								<p>
									<input class="log" type="submit" value="Se connecter">
								</p>
							</form>
						</div>
					</div>
				</section>
			</main>
		</div>
		<?php

		if( isset($_GET['logEmpty'])){
			echo '<p class="alert alert-danger">Le pseudo et le mot de passe sont obligatoires.</p>';
		}

		if( isset($_GET['userUnknown'])){
			echo '<p class="alert alert-danger">Ce couple utilisateur/mot de passe est inconnu.</p>';
		}

		?>
    </body>
</html>










