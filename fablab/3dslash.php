<?php 
    include('config/settings.php');

	$articles = $mysql->prepare('SELECT contenus.title, imgBandeau, resume FROM contenus WHERE categorie = :c');
	$articles->execute(array(':c' => 'slash'));

    $page = $mysql->prepare('SELECT * FROM page WHERE categorie = :s');
    $page->execute(array(':s' => 'slash'));

    $pages = $page->fetch();


        $key="779710054180cf47b130dc266601b2be52b280732c77602f5d3b4c7bb7277176";
    $partner="AntoineB";
    $urlbase="https://www.3dslash.net";
    $content="";
    $src="";
    $redirect="antbdone.php";
    
    $uri = (((!isset($_SERVER['HTTPS']))||($_SERVER['HTTPS']!="on"))?'http://':'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $i=strrpos ($uri,"/",-1);
    $redirect=substr($uri,0,$i+1).$redirect;
    $sign=hash("sha256","$key|$partner|$content|$src|$redirect");
    $url="$urlbase/slash.php?partner=$partner&content=$content&src=$src&redirect=$redirect&sign=$sign&openhelp=1";

?>
   
   
   
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Antoine Barilt - 3D Slash</title>
        <?php 
    	include('include/head.php');
    ?>
    </head>

    <body>
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
                            <h1>Bienvenue sur 3D Slash</h1>
                            <p>
                                <?php echo $pages['intro']; ?>
                            </p>
                        </div>
                    </div>
                </section>
            </div>
            <main class="wrapper">
                <section class="container gutters l-pad">
                    <iframe class="slash" frameborder=1 src="<?php echo $url?>"></iframe>
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