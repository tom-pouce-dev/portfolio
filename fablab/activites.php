<?php 
    include('config/settings.php');

	$articles = $mysql->prepare('SELECT contenus.title, imgBandeau, resume FROM contenus WHERE categorie = :c');
	$articles->execute(array(':c' => 'activites'));

    $page = $mysql->prepare('SELECT * FROM page WHERE categorie = :a');
    $page->execute(array(':a' => 'activites'));

    $pages = $page->fetch();

?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Antoine Barilt - Les activités du FabLab</title>
        <?php 
    	include('include/head.php');
    ?>
    </head>

    <body class="activites">
        <!-------------------->
        <!------ HEADER ------>
        <!-------------------->
        <?php 
		include('include/header.php');
	?>
            <!-------------------->
            <!------- MAIN ------->
            <!-------------------->
            <div class="wrapper">
                <section class="container gutters xl-pad">
                    <div class="row">
                        <div class="l-col-12">
                            <h1>Les activités du Fab Lab</h1>
                            <p>
                                <?php echo $pages['intro']; ?>
                            </p>
                        </div>
                    </div>
                </section>
            </div>
            <main>
                <?php while($data = $articles->fetch()){ ?>
                    <div class="wrapper">
                        <section class="container gutters l-pad bloc-box">
                            <article class="row">
                                <div class="l-col-5 m-col-5">
                                    <figure style="background: url(<?php echo $data['imgBandeau']; ?>) center center / cover;"></figure>
                                </div>
                                <div class="l-col-7 m-col-7 nogutters">
                                    <div class="l-col-7 m-col-7">
                                        <h1><?php echo $data['title']; ?></h1>
                                        <p>
                                            <?php echo $data['resume']; ?>
                                        </p>
                                    </div>
                                </div>
                            </article>
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