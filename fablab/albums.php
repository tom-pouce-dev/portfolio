<?php
	include('config/settings.php');

	$album = $mysql->prepare('SELECT * FROM albumdetail WHERE id_album = :i');
	$album->execute(array(':i' => $_GET['id']));

	$albums = $mysql->prepare('SELECT * FROM albumdetail WHERE id_album = :i');
	$albums->execute(array(':i' => $_GET['id']));

	$photos = $mysql->prepare('SELECT id, name_album FROM albumsphotos WHERE id = :i');
	$photos->execute(array(':i' => $_GET['id']));

	$data2 = $photos->fetch();

	$i = 1;
	$j = 1;

	if($albums->rowCount() == 0) {
		header('Location: galerie.php?albumVide');
	}

?><!DOCTYPE html>
<html lang="fr">
<head>
	<title>Antoine Barilt - Album photo : <?php echo $data2['name_album']; ?></title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="lightbox">
	<!-------------------->
	<!------ HEADER ------>
	<!-------------------->
	<?php 
		include('include/header.php');
	?>
	<!--------------------->
	<!------- CLAIM ------->
	<!--------------------->
	<section class="wrapper">
		<section class="container gutters xl-pad">
                <div class="row">
                    <div class="l-col-9">
                        <h1><?php echo $data2['name_album']; ?></h1>
                    </div>
                    <div class="l-col-3">
                        <div class="share">
                            <div class="social">
                                <a href="http://twitter.com/intent/tweet/?url=http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>&text=<?php echo $data2['name_album']; ?>&via=AntoineBarilt #AntoineBarilt #FabLab"><span class="icon-twitter2"></span></a>
                                <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');"><span class="icon-facebook2"></span></a>
                            </div>
                            <h3>Partager sur</h3>
				        </div>
                    </div>
                </div>
            </section>
	</section>
	<main class="wrapper">
		<!---------------------->
		<!------- SLIDER ------->
		<!---------------------->
		<div class="wrapper wood">
			<section id="sG" class="container gutters">
				<div class="row">
					<div id="sG_big" class="row">
						<div class="l-col-12 m-col-12">
							<?php while($data = $albums->fetch()) { ?>
							<figure id="img<?php echo $i++; ?>" class="l-col-12 nogutters" style="background: url(<?php echo $data['picture'] ?>) center center / cover;"><?php if(!empty($data['alt'])) { ?><figcaption class="l-col-12"><?php echo $data['alt']; ?></figcaption><?php } ?></figure>
							<?php } ?>
						</div>
					</div>
					<div id="sG_nav" class="row">
						<div class="l-col-1 m-col-1">
							<span class="icon-play3"></span>
						</div>
						<ul class="l-col-10 m-col-10">
						<?php while($data = $album->fetch()) { ?>
							<li><a rel="img<?php echo $j++; ?>" class="l-col-2 l-offset-1 m-col-3"><span style="background: url(<?php echo $data['picture'] ?>) center center / cover;"></span></a></li>
						<?php } ?>
						</ul>
						<div class="l-col-1 m-col-1">
							<span class="icon-play3"></span>
						</div>
					</div>
				</div>
			</section>
		</div>
	</main>
	<!-------------------->
	<!------ FOOTER ------>
	<!-------------------->
	<?php 
		include('include/footer.php');
	?>
</body>
</html>