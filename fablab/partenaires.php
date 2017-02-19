<?php 
    include('config/settings.php');

	$part = $mysql->prepare('SELECT * FROM contenus WHERE categorie = :p');
	$part->execute(array(':p' => 'partenaires'));

?><!DOCTYPE html>
<html lang="fr">
<head>
	<title>Antoine Barilt - Les partenaires du FabLab</title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="partenaires">
	<!-------------------->
	<!------ HEADER ------>
	<!-------------------->
	<?php 
		include('include/header.php');
	?>
	<main class="wrapper">
		<!-------------------------------->
		<!------- MENTIONS LEGALES ------->
		<!-------------------------------->
		<section class="container gutters">
			<div class="l-col-12"><h1 class="title-ter">Partenaires</h1></div>
			<article class="row center">
				
				<?php while($data = $part->fetch()) { ?>
					<div class="l-col-4 m-col-4">
						<figure>
							<a href="<?php echo $data['resume']; ?>"><img src="<?php echo $data['imgTexte']; ?>" alt="[antoine barilt fablab-partenaires][<?php echo $data['title']; ?>]"></a>
							<figcaption><?php echo $data['title']; ?></figcaption>
						</figure>
					</div>
				<?php } ?>
				
			</article>
			
		</section>
	</main>
	<!-------------------->
	<!------ FOOTER ------>
	<!-------------------->
	<?php 
		include('include/footer.php');
	?>
</body>
</html>