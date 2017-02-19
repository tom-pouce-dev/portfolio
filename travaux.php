<?php
session_start();
if(isset($_GET['lang']))
  $_SESSION['lang'] = $_GET['lang']; //GET value from chosen lang

if(!isset($_SESSION['lang']))
  $_SESSION['lang'] = 'fr'; //default case

require_once 'lang/' . $_SESSION['lang'] . '-lang.php'; //include file dinamically
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Thomas portfolio</title>
        <?php 
    	include('include/head.php');
    ?>
    </head>

    <body class="wrapper1">
        <!--Header-->
        <?php 
		include('include/header.php');
	?>
            <!-- Fin Header-->

            <!--Div infos-->
            <main id="works">
                <section class="container gutters">
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12">
                        <div class="filtre-global">
                            <p class="filtre"><?php echo $lang['select']; ?></p>
                            <ul class="filtre-list">
                                <li class="filter" id="web"><?php echo $lang['web']; ?></li>
                                <li class="filter" id="print"><?php echo $lang['print']; ?></li>
                                <li class="filter" id="identite"><?php echo $lang['identite']; ?></li>
                                <li class="filter" id="gestion"><?php echo $lang['gestion']; ?></li>
                                <li class="filter" id="*"><?php echo $lang['annul']; ?></li>
                            </ul>
                        </div>
                    </div>
                    <!-------------------------NOSYWISE----------------------------->

                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card identite">
                        <a href="travaux/nosywise.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/nosywise.jpg" alt="cogedim téléphone" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['nosywise']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------FIN LIGNE---------------------------->
                    <!-------------------------BLINDATE----------------------------->
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card web">
                        <a href="travaux/blindate.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/blindate.jpg" alt="blindate" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['blindate']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------PETIT PONT----------------------------->
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card web">
                        <a href="travaux/petit-pont.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/petitpont.jpg" alt="cogedim téléphone" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['petitpont']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------FIN LIGNE---------------------------->
                    <!-------------------------FAB LAB----------------------------->
<!--
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card web">
                        <a href="travaux/fablab.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/fablab.jpg" alt="fab lab" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['fablab']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
-->
                    <!-------------------------FIN LIGNE---------------------------->
                    <!-------------------------COGEDIM----------------------------->
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card web">
                        <a href="travaux/cogedim.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/cogedim.jpg" alt="cogedim téléphone" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['cogedim']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------FIN LIGNE---------------------------->
                    <!-------------------------ACER----------------------------->
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card gestion">
                        <a href="travaux/acer.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/acer.jpg" alt="cogedim téléphone" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['acer']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------FIN LIGNE---------------------------->
                    <!-------------------------COURRIER JEUNE----------------------------->
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card print">
                        <a href="travaux/courrier.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/courrier.jpg" alt="cogedim téléphone" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['courrier']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------FIN LIGNE---------------------------->
                    <!-------------------------ADIDAS----------------------------->
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card print">
                        <a href="travaux/adidas.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/adidas.jpg" alt="cogedim téléphone" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['adidas']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------FIN LIGNE---------------------------->
                    <!-------------------------ANIMAUX----------------------------->
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card print">
                        <a href="travaux/animaux.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/animaux.jpg" alt="cogedim téléphone" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['animaux']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------FIN LIGNE---------------------------->
                    <!-------------------------GO PRO----------------------------->
                    <div class="xl-col-12 l-col-12 m-col-12 s-col-12 card print">
                        <a href="travaux/gopro.php" class="realisation-link">
                            <div class="realisation">
                                <div class="realisation-image">
                                    <img src="img/portfolio/gopro.jpg" alt="cogedim téléphone" id="vignette">
                                </div>
                                <div class="realisation-info">
                                    <h4><?php echo $lang['gopro']; ?></h4>
                                    <span class="button"><?php echo $lang['voir']; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-------------------------FIN LIGNE---------------------------->

                </section>
            </main>
            <!-- footer -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="js/custom.js"></script>
    </body>

    </html>