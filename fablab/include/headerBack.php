<?php 
	//on recupere le nom du fichier affiche
	$page = explode('/', $_SERVER['PHP_SELF']);
	$nom = $page[count($page) - 1];

?>

<div class="wrapper menu-h">
	<div class="logo l-col-1 m-col-2 nogutters">
		<a href="index.php"><img src="../data/logo.png" alt="Logo Antoine Barilt"></a> 
	</div>
	<div class="l-col-3 m-col-3 gutters"><h1>Bonjour <span><?php echo $_SESSION['user']; ?></span> !</h1></div>
</div>

<header class="menu-v l-col-2 m-col-3">
	<nav>
		<ul>
			<li <?php if($nom == 'index.php') echo 'class="active"'; ?>><a href="index.php">Accueil</a></li>
			<?php 
				//si l'utilisateur n'est pas connecte
				if( empty($_SESSION['user'])){
			?>
			<li <?php if($nom == 'logIn.php') echo 'class="active"'; ?>><a href="logIn.php">Se connecter</a></li>
			<?php
				//fin (si pas connecte)
				}else{
			?>
			<li <?php if($nom == 'actualites.php' || $nom == 'actualite.php' || $nom == 'editActualite.php' || $nom == 'addActualite.php') echo 'class="active"'; ?>><a href="actualites.php">Késako / Actualités</a></li>
			<li <?php if($nom == 'equipements.php' || $nom == 'equipement.php' || $nom == 'editEquipement.php' || $nom == 'addEquipement.php' || $nom == 'intro.php') echo 'class="active"'; ?>><a href="equipements.php">Équipements / 3D Hubs</a></li>
			<li <?php if($nom == 'activites.php' || $nom == 'activite.php' || $nom == 'editActivite.php' || $nom == 'addActivite.php' || $nom == 'intro.php') echo 'class="active"'; ?>><a href="activites.php">Activités</a></li>
			<li <?php if($nom == 'galerie.php' || $nom == 'editCat.php' || $nom == 'editAlb.php' || $nom == 'intro.php') echo 'class="active"'; ?>><a href="galerie.php">Galerie</a></li>
			<li <?php if($nom == 'intro.php') echo 'class="active"'; ?>><a href="intro.php">En-têtes</a></li>
			<li <?php if($nom == 'partenaires.php' || $nom == 'partenaire.php' || $nom == 'editPartenaire.php' || $nom == 'addPartenaire.php') echo 'class="active"'; ?>><a href="partenaires.php">Partenaires</a></li>
			<li <?php if($nom == 'mentions.php') echo 'class="active"'; ?>><a href="mentions.php">Mentions légales</a></li>
			<li <?php if($nom == 'contact.php') echo 'class="active"'; ?>><a href="contact.php">Contact</a></li>
			<li <?php if($nom == 'account.php') echo 'class="active"'; ?>><a href="account.php">Mon compte</a></li>
			<li><a href="../traitement/logOut.php">Se déconnecter</a></li>
			<?php } ?>
		</ul>
	</nav>
</header>