<?php 
    include('config/settings.php');

	$mentions = $mysql->prepare('SELECT * FROM page WHERE categorie = :m');
	$mentions->execute(array(':m' => 'mentions'));

    $data = $mentions->fetch();

?><!DOCTYPE html>
<html lang="fr">
<head>
	<title>Antoine Barilt - Mentions légales</title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="mentions">
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
			<div class="l-col-12"><h1 class="title-ter">Mentions légales</h1></div>
			<article class="row">
				<div class="l-col-12">
					<p><?php echo $data['intro']; ?></p>
				</div>
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