<?php
	include('../config/settings.php');

	if( empty($_SESSION['user'])){
		header('Location: logIn.php');
	}

	$users = $mysql->prepare('SELECT * FROM users WHERE level != :i ORDER BY id DESC');
	$users->execute(array( ':i' => 'admin'));

	$socials = $mysql->prepare('SELECT * FROM social');
	$socials->execute();

	$media = $socials->fetch();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Antoine Barilt - Back Office - Mon compte</title>
		<?php include('../include/headBack.php'); ?>
	</head>
	<body class="gutters">
	<?php include('../include/headerBack.php'); ?>
		<main class="l-col-10 l-offset-2 m-col-9 m-offset-3">
		<?php include('../include/headerAlert.php'); ?>
			<div class="l-col-12 m-col-12">
				<h1>Gestion de mon compte</h1>
			</div>
			<div class="l-col-6 m-col-6">
				<form action="../traitement/updateAccount.php" method="POST">
					<h2>Modification du mot de passe</h2>
					<input type="password" name="oldPass" placeholder="Mot de passe actuel"><br/><br/>
					<input type="password" name="password" placeholder="Nouveau mot de passe"><br/><br/>
					<input type="password" name="confirmPassword" placeholder="Confirmation du nouveau mot de passe">

					<div class="btn">
						<button type="submit" value="Valider">Valider</button>
					</div>
				</form>
			</div>
			<div class="l-col-12 m-col-12">
				<h1>Réseaux sociaux</h1>
			</div>
			<div class="row">
				<form action="../traitement/editSocial.php" method="POST">
					<div class="l-col-6 m-col-6">
						<h2>Facebook</h2>
						<input type="text" name="fb" placeholder="Lien vers Facebook (100 caractères max)" value="<?php echo $media['facebook']; ?>" maxlength="100">
					</div>
					<div class="l-col-6 m-col-6">
						<h2>Twitter</h2>
						<input type="text" name="tw" placeholder="Lien vers Twitter (100 caractères max)" value="<?php echo $media['twitter']; ?>" maxlength="100">
					</div>
					<div class="l-col-6 m-col-6 btn">
						<h2>Pinterest</h2>
						<input type="text" name="pt" placeholder="Lien vers Pinterest (100 caractères max)" value="<?php echo $media['pinterest']; ?>" maxlength="100">
					</div>
					<div class="l-col-6 m-col-6 btn">
						<h2>Youtube</h2>
						<input type="text" name="yt" placeholder="Lien vers Youtube (100 caractères max)" value="<?php echo $media['youtube']; ?>" maxlength="100">
					</div>
					<div class="l-col-12 m-col-12">
						<button type="submit" value="Valider">Valider</button>
					</div>
				</form>
			</div>
			<?php if( $_SESSION['level'] == 'admin'){ ?>
			<div class="l-col-12 m-col-12">
				<h1>Commandes administrateur</h1>
			</div>
			<div class="l-col-6 m-col-6">
				<form action="../traitement/addUser.php" method="POST">
					<h2>Ajouter un modérateur</h2>
					<input type="text" name="pseudo" placeholder="Le pseudo" value="<?php if(!empty($_GET['pseudo'])) echo $_GET['pseudo']; ?>"><br/><br/>
					<input type="text" name="passworbd" placeholder="Le mot de passe">

					<div class="btn">
						<button type="submit" value="Valider">Valider</button>
					</div>
				</form>
			</div>
			<?php if($users->rowCount() != 0) { ?>
			<div class="l-col-6 m-col-6">
				<form action="../traitement/deleteUser.php" method="POST">
					<h2>Supprimer un modérateur</h2>
					<select name="oldOwner">
					<?php 
						while($user = $users->fetch()){
							echo '<option value="'.$user['id'].'">'.$user['pseudo'].'</option>';
						}
					?>
					</select>
					<input type="hidden" name="newOwner" value="<?php echo $_SESSION['id']; ?>">
					<button  class="del" type="submit">Supprimer</button>
				</form>
			</div>
			<?php } } ?>
		</main>
		<?php include('../include/footerBack.php'); ?>
	</body>
</html>