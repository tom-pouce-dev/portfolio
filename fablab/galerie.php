<?php 
    include('config/settings.php');

	$galCat = $mysql->prepare('SELECT * FROM albumsphotos WHERE description IS NOT NULL');
	$galCat->execute();

	$albCat = $mysql->prepare('SELECT * FROM albumcategorie');
	$albCat->execute();

	$page = $mysql->prepare('SELECT * FROM page WHERE categorie = :g');
	$page->execute(array(':g' => 'galerie'));

	$lead = $page->fetch();

?><!DOCTYPE html>
<html lang="fr">
<head>
	<title>Antoine Barilt - Galerie photos du FabLab</title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="gal-cat">
	<!-------------------->
	<!------ HEADER ------>
	<!-------------------->
	<?php 
		include('include/header.php');
	?>
	<!-------------------->
	<!------- MAIN ------->
	<!-------------------->
	<main>
        <div class="wrapper">
           	<?php 
			if( isset($_GET['albumVide'])){
				echo '<h1 class="failed center">Cet album ne contient pas encore de photos.</h1>';
			}
			?>
            <section class="container gutters xl-pad">
                <div class="row">
                    <div class="l-col-12 center">
                        <h1>Galerie photos</h1>
                        <p><?php echo $lead['intro']; ?></p>
                    </div>
                </div>
                <div class="row">
                	<ul class="l-col-12 center galerie-categorie">
						<li><button type="button" class="filter all" data-filter=".mix">All</button></li>
						<?php while($data2 = $albCat->fetch()) { ?>
							<li><button type="button" class="filter" data-filter=".<?php echo $data2['categorie']; ?>"><?php echo $data2['nomCategorie']; ?></button></li>
						<?php } ?>
                	</ul>
                </div>
            </section>
            <section class="container gutters galerie">
				<div class="row">
					<ul id="grid">
						<?php while($data = $galCat->fetch()) { ?>
							<li class="mix <?php echo $data['cat'] ?> l-col-4 m-col-6 sl-col-6">
								<figure style="background: url(<?php echo $data['description'] ?>) center center / cover;">
									<a href="albums.php?id=<?php echo $data['id'] ?>" class="galerie-link"></a>
									<figcaption><a href="albums.php?id=<?php echo $data['id']; ?>"><?php echo $data['name_album'] ?></a></figcaption>
								</figure>
							</li>
                        <?php } ?>
					</ul>
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