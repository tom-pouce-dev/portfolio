<?php
	include('config/settings.php');

	$articles = $mysql->prepare('SELECT * FROM contenus JOIN users ON contenus.created_by = users.id WHERE contenus.id = :i');
	$articles->execute(array(':i' => $_GET['id']));

	if($articles->rowCount() == 0){
		header('Location: error404.php');
		exit();
	}else{
		$data = $articles->fetch();
	}

	$aside = $mysql->prepare('SELECT contenus.id, title, imgTexte, categorie FROM contenus WHERE (categorie = :a AND id != :j) ORDER BY id DESC LIMIT 2');
	$aside->execute(array(':a' => 'actu',
                          ':j' => $_GET['id']));

?><!DOCTYPE html>
<html lang="fr">
<head>
	<title>Antoine Barilt - <?php echo $data['title'] ?></title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="news">
	<!-------------------->
	<!------ HEADER ------>
	<!-------------------->
	<?php 
		include('include/header.php');
	?>
	<!--------------------->
	<!-- CLAIM // SLIDER -->
	<!--------------------->
	<section class="wrapper claim" style="background: url(<?php echo $data['imgBandeau'] ?>) center center / cover;">
		<div class="container gutters">
			<div class="bloc-claim">
			</div>
		</div>
	</section>
	<main class="wrapper">
		<!-------------------------->
		<!------- WHAT WE DO ------->
		<!-------------------------->
		<section class="container gutters">
			<article class="l-col-8">
				<h1><?php echo $data['title']; ?></h1>
                <h3>Posté le <?php echo dateEU($data['created_at'], true) ?> par <span><?php echo $data['pseudo']; ?></span>.</h3>
				<p class="chapeau"><?php echo $data['lead']; ?></p>
				<figure>
					<img src="<?php echo $data['imgTexte'] ?>" alt="[antoine barilt fablab-actualités][<?php echo $data['title']; ?>]">
				</figure>
				<p><?php echo $data['resume'] ?></p>
			</article>
			<aside class="l-col-3 l-offset-1 nogutters">
				<div class="share">
					<div class="social">
						<a href="http://twitter.com/intent/tweet/?url=http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>&text=<?php echo $data['title']; ?>&via=AntoineBarilt #AntoineBarilt #FabLab"><span class="icon-twitter2"></span></a>
						<a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');"><span class="icon-facebook2"></span></a>
					</div>
					<h3>Partager sur</h3>
				</div>
				<?php while($dataB = $aside->fetch()){ ?>
                    <div class="l-col-12 m-col-6 sl-col-6 other nogutters">
                        <figure style="background: url(<?php echo $dataB['imgTexte']; ?>) center center / cover;"></figure>
                        <a href="news.php?id=<?php echo $dataB['id'] ?>" class="btn-l center"><?php echo $dataB['title'] ?><span class="icon-fleche"></span></a>
                    </div>
                <?php } ?>
			</aside>
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