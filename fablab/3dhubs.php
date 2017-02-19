<?php 
    include('config/settings.php');

	$articles = $mysql->prepare('SELECT contenus.title, imgTexte, resume FROM contenus WHERE categorie = :c');
	$articles->execute(array(':c' => 'machines'));

    $page = $mysql->prepare('SELECT * FROM page WHERE categorie = :d');
    $page->execute(array(':d' => '3dhubs'));

    $pages = $page->fetch();

?><!DOCTYPE html>
<html lang="fr">
<head>
	<title>Antoine Barilt - Les machines du FabLab</title>
	<?php 
    	include('include/head.php');
    ?>
</head>
<body class="hubs">
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
                    <h1>Découvrez les machines du Fab Lab.</h1>
                    <p><?php echo $pages['intro']; ?></p>
                    <a href="https://www.3dhubs.com/paris/hubs/antoine/3dprint" data-3dhubs-widget="button" data-hub-id="49018" data-type="hubLink" data-color="red" data-size="large" data-text="USE MY EPSON A4">VERS 3D HUBS</a>
    <script>!function(a,b,c,d){var e,g=(a.getElementsByTagName(b)[0],/^http:/.test(a.location)?"http":"https");a.getElementById(d)||(e=a.createElement(b),e.id=d,e.src=g+"://d3d4ig4df637nj.cloudfront.net/w/2.0.js",e.async=!0,a.body.appendChild(e))}(document,"script",1,"h3d-widgets-js");</script>
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
                            <figure>
                                <img src="<?php echo $data['imgTexte']; ?>" alt="[antoine barilt fablab-3dhubs][<?php echo $data['title']; ?>]">
                            </figure>
                        </div>
                        <div class="l-col-7 m-col-7 nogutters">
                            <div class="l-col-7 m-col-7">
                                <h1><?php echo $data['title']; ?></h1>
                                <p><?php echo $data['resume']; ?></p>
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