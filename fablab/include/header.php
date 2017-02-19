<?php 
$page = explode('/', $_SERVER['PHP_SELF']);
$nom = $page[count($page)-1];
?>

<header class="wrapper">
	<div class="container gutters">
        <?php if($nom == 'howitworks.php' || $nom == 'albums.php' || $nom == 'news.php') { ?>
            <div id="inline-popups">
                <a href="#test-popup" data-effect="mfp-zoom-in"><span class="icon-share2"></span></a>
            </div>
            <div id="test-popup" class="white-popup mfp-with-anim mfp-hide">
                <h2>Partager via :</h2>
                <div class="row">
                    <div class="l-col-6 m-col-6 s-col-6">
                        <a onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');"><span class="icon-facebook2"></span><h3>Facebook</h3></a>
                    </div>
                    <div class="l-col-6 m-col-6 s-col-6">
                        <a href="http://twitter.com/intent/tweet/?url=http://twitter.com/intent/tweet/?url=http://<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>&text=<?php if($nom == 'howitworks.php' || $nom == 'news.php') { echo $data['title']; }else { echo $data2['name_album']; } ?>&via=AntoineBarilt #AntoineBarilt #FabLab"><span class="icon-twitter2"></span><h3>Twitter</h3></a>
                    </div>
                </div>
            </div>
        <?php } ?>
		<div id="logo" class="l-col-2 m-col-3 s-col-5 sl-col-3">
			<a href="index.php"><img src="data/logo.png" alt="Logo Antoine Barilt"></a>
		</div>
		<span class="icon-menu"></span>
		<nav class="l-col-10 m-col-12 s-col-12">
			<ul>
				<li><a href="howitworks.php" <?php if($nom == 'howitworks.php') echo 'class="active"'; ?>>Comment ça marche ?</a></li>
				<li><a href="3dslash.php" <?php if($nom == '3dslash.php') echo 'class="active"'; ?>>3D Slash</a></li>
				<li><a href="activites.php" <?php if($nom == 'activites.php') echo 'class="active"'; ?>>Activités</a></li>
				<li><a href="3dhubs.php" <?php if($nom == '3dhubs.php') echo 'class="active"'; ?>>3D Hubs</a></li>
				<li><a href="actualites.php" <?php if($nom == 'actualites.php' || $nom == 'news.php') echo 'class="active"'; ?>>Actualités</a></li>
				<li><a href="galerie.php" <?php if($nom == 'galerie.php' || $nom == 'albums.php') echo 'class="active"'; ?>>Galerie</a></li>
				<li><a href="contact.php" <?php if($nom == 'contact.php') echo 'class="active"'; ?>>Contact</a></li>
			</ul>
		</nav>
	</div>
</header>