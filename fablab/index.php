<?php
	include('config/settings-locale.php');

	$articles = $mysql->prepare('SELECT contenus.id, title, resume, created_at, imgTexte, categorie FROM contenus WHERE categorie = :a ORDER BY id DESC LIMIT 3');
	$articles->execute(array(':a' => 'actu'));

	$galCat = $mysql->prepare('SELECT * FROM albumsphotos WHERE description IS NOT NULL ORDER BY id DESC LIMIT 6');
	$galCat->execute();
	
    $claim = $mysql->prepare('SELECT contenus.id, title, imgBandeau, categorie, home FROM contenus WHERE home = :h');
    $claim->execute(array(':h' => '1'));
    
    $dataClaim = $claim->fetch();

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
	<title>Antoine Barilt - Le 1er FabLab de Meaux</title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="home">
	<!-------------------->
	<!------ HEADER ------>
	<!-------------------->
	<?php 
		include('include/header.php');
	?>
	<!--------------------->
	<!-- CLAIM // SLIDER -->
	<!--------------------->
	<section class="wrapper claim" style="background: url(<?php echo $dataClaim['imgBandeau'] ?>) center center / cover;">
		<div class="container gutters">
			<div class="bloc-claim">
				<div class="row">
					<div class="l-col-6 m-col-7 s-col-9 sl-col-7">
						<h1><?php echo $dataClaim['title']; ?></h1>
					</div>
				</div>
				<div class="row">
					<div class="l-col-5">
                        <?php if($dataClaim['id'] == 1) { ?>
				            <a href="howitworks.php" class="btn btn-s">Voir plus <span class="icon-fleche"></span></a>
                        <?php }else{ ?>
                            <a href="news.php?id=<?php echo $dataClaim['id'] ?>" class="btn btn-s">Voir plus <span class="icon-fleche"></span></a>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<main class="wrapper">
		<!-------------------------->
		<!------- WHAT WE DO ------->
		<!-------------------------->
		<section class="container gutters">
			<div class="l-col-12"><h1 class="title-ter">Que peut-on y faire ?</h1></div>
			<article class="row">
				<div class="l-col-3 m-col-6 s-col-12 sl-col-6 center">
					<div class="row">
						<figure class="l-col-10 l-offset-1 m-col-6 m-offset-3 s-col-12 sl-col-12 nogutters">
							<img src="<?php echo $dataW['icoHome']; ?>" alt="" class="l-col-10 l-offset-1 m-col-10 m-offset-1 s-col-6 s-offset-3">
						</figure>
					</div>
					<h2><?php echo $dataW['title']; ?></h2>
					<p class="what-1"><?php echo $dataW['resume']; ?></p>
				</div>
				<div class="l-col-3 m-col-6 s-col-12 sl-col-6 center">
					<div class="row">
						<figure class="l-col-10 l-offset-1 m-col-6 m-offset-3 s-col-12 sl-col-12 nogutters">
							<img src="<?php echo $dataX['icoHome']; ?>" alt="" class="l-col-10 l-offset-1 m-col-10 m-offset-1 s-col-6 s-offset-3">
						</figure>
					</div>
					<h2><?php echo $dataX['title']; ?></h2>
					<p class="what-2"><?php echo $dataX['resume']; ?></p>
				</div>
				<div class="l-col-3 m-col-6 s-col-12 sl-col-6 center">
					<div class="row">
						<figure class="l-col-10 l-offset-1 m-col-6 m-offset-3 s-col-12 sl-col-12 nogutters">
							<img src="<?php echo $dataY['icoHome']; ?>" alt="" class="l-col-10 l-offset-1 m-col-10 m-offset-1 s-col-6 s-offset-3">
						</figure>
					</div>
					<h2><?php echo $dataY['title']; ?></h2>
					<p class="what-3"><?php echo $dataY['resume']; ?></p>
				</div>
				<div class="l-col-3 m-col-6 s-col-12 sl-col-6 center">
					<div class="row">
						<figure class="l-col-10 l-offset-1 m-col-6 m-offset-3 s-col-12 sl-col-12 nogutters">
							<img src="<?php echo $dataZ['icoHome']; ?>" alt="" class="l-col-10 l-offset-1 m-col-10 m-offset-1 s-col-6 s-offset-3">
						</figure>
					</div>
					<h2><?php echo $dataZ['title']; ?></h2>
					<p class="what-4"><?php echo $dataZ['resume']; ?></p>
				</div>
			</article>
		</section>
		<!---------------------->
		<!-- ARTICLES RECENTS -->
		<!---------------------->
		<div class="wrapper wood">
			<section class="container gutters">
				<div class="row">
					<div class="l-col-6 m-col-6 s-col-12">
						<h1 class="title-sec">Les articles récents</h1>
					</div>
					<div class="l-col-4 l-offset-2 m-col-4 m-offset-2">
						<a href="actualites.php" class="more"><h3 class="red">Accéder aux articles <span class="icon-fleche"></span></h3></a>
					</div>
				</div>
				<div class="row">
					<div class="l-col-12 nogutters">
                        <?php while($data = $articles->fetch()){ ?>
                            <article class="l-col-4 m-col-4 gutters">
                                <div class="l-col-12 nogutters">
                                    <figure class="imgArtInd" style="background: url(<?php echo $data['imgTexte'] ?>) center center / cover;"></figure>
                                </div>
                                <div class="l-col-12 white">
                                    <h2><?php echo $data['title']; ?></h2>
                                    <p><?php echo tronquer($data['resume'], 240); ?></p>
                                </div>
                                <div class="l-col-12 nogutters">
                                    <a href="news.php?id=<?php echo $data['id'] ?>" class="btn-l center">lire la suite <span class="icon-fleche"></span></a>
                                </div>
                            </article>
						<?php } ?>
					</div>
				</div>
			</section>
		</div>
		<!--------------------->
		<!------ GALERIE ------>
		<!--------------------->
		<section class="container gutters galerie">
		<?php if($galCat->rowCount() == 0){ ?>
            <div class="row">
                <div class="l-col-6 m-col-7 sl-col-12">
                    <h1 class="title-ter">Aucun album disponible</h1>
                </div>
                <div class="l-col-3 l-offset-3 m-col-4 m-offset-1 sl-col-12">
					<a href="galerie.php" class="more"><h3 class="blue">Accéder à la galerie <span class="icon-fleche"></span></h3></a>
				</div>
            </div>
        <?php }else{ ?>
			<div class="row">
				<div class="l-col-6 m-col-7 sl-col-12">
					<h1 class="title-ter">Le Fab Lab en images</h1>
				</div>
				<div class="l-col-3 l-offset-3 m-col-4 m-offset-1 sl-col-12">
					<a href="galerie.php" class="more"><h3 class="blue">Accéder à la galerie <span class="icon-fleche"></span></h3></a>
				</div>
			</div>
			<div class="row">
                <?php while($data2 = $galCat->fetch()){ ?>
                    <div class="l-col-4 m-col-6 sl-col-6">
                        <figure style="background: url(<?php echo $data2['description'] ?>) center center / cover;">
                            <a href="albums.php?id=<?php echo $data2['id'] ?>" class="galerie-link"></a>
                            <figcaption><a href="albums.php?id=<?php echo $data2['id']; ?>"><?php echo $data2['name_album'] ?></a></figcaption>
                        </figure>
                    </div>
                <?php } ?>
			</div>
		</section>
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