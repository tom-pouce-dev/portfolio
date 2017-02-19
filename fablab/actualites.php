<?php 
    include('config/settings.php');

	$articles = $mysql->prepare('SELECT id, contenus.title, imgTexte, lead, created_at FROM contenus WHERE categorie = :a ORDER BY created_at DESC');
	$articles->execute(array(':a' => 'actu'));

?><!DOCTYPE html>
<html lang="fr">
<head>
	<title>Antoine Barilt - Les actualités du FabLab</title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="actualites">
	<!-------------------->
	<!------ HEADER ------>
	<!-------------------->
	<?php 
		include('include/header.php');
	?>
	<main class="wrapper">
		<!------------------------->
		<!------- ACTUALITES------->
		<!------------------------->
		<?php while($data = $articles->fetch()) { ?>
            <div class="wrapper">
                <section class="container gutters l-pad bloc-box">
                    <div class="row">
                        <div class="l-col-5 m-col-5 sl-col-6">
                            <figure style="background: url(<?php echo $data['imgTexte']; ?>) center center / cover;"></figure>
                        </div>
                        <div class="l-col-7 m-col-7">
                            <h1 class="l-col-8 m-col-8 s-col-8 nogutters"><?php echo $data['title']; ?></h1>
                            <h2 class="l-col-4 m-col-4 s-col-4 nogutters">/ <?php echo dateMonth($data['created_at']); ?></h2>
                            <div class="row">
                                <p><?php echo $data['lead']; ?></p>
                            </div>
                            <a href="news.php?id=<?php echo $data['id'] ?>" class="btn btn-s">Voir plus <span class="icon-fleche"></span></a>
                        </div>
                    </div>
                </section>
            </div>
        <?php } ?>
	</main>
	<!-------------------->
	<!------ FOOTER ------>
	<!-------------------->
	<?php 
		include('include/footer.php');
	?>
</body>
</html>