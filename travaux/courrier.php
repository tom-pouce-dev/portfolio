<?php
session_start();
if(isset($_GET['lang']))
  $_SESSION['lang'] = $_GET['lang']; //GET value from chosen lang

if(!isset($_SESSION['lang']))
  $_SESSION['lang'] = 'fr'; //default case

require_once '../lang/' . $_SESSION['lang'] . '-lang.php'; //include file dinamically
?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Thomas portfolio</title>
        <?php 
    	include('../include/headwork.php');
    ?>
    </head>

    <body class="wrapper1">

        <!--Header-->
        <?php 
		include('../include/headerwork.php');
	?>
            <!-- Fin Header-->

            <!--Div infos-->
            <main>
                <div id="wrapper-background-courrier">
                </div>
                <div id="wrapper-content">
                    <section class="container gutters fond">
                        <div class="xl-col-12">
                            <h3><?php echo $lang['courrier']; ?></h3>
                            <p>
                                <?php echo $lang['texteCourrier']; ?>
                            </p>

                            <div class="xl-col-12">
                                <div id="slides">
                                    <img src="../img/courrier/1.jpg" alt="1" />
                                    <img src="../img/courrier/23.png" alt="2-3" />
                                    <img src="../img/courrier/45.png" alt="4-5" />
                                    <img src="../img/courrier/67.png" alt="6-7" />
                                    <img src="../img/courrier/89.png" alt="8-9" />
                                    <img src="../img/courrier/1011.png" alt="10-11" />
                                    <img src="../img/courrier/1213.png" alt="12-13" />
                                    <img src="../img/courrier/1415.png" alt="14-15" />
                                    <img src="../img/courrier/1617.png" alt="16-17" />
                                    <img src="../img/courrier/1819.png" alt="18-19" />
                                    <img src="../img/courrier/2021.png" alt="20-21" />
                                    <img src="../img/courrier/2223.png" alt="22-23" />
                                    <img src="../img/courrier/2425.png" alt="24-25" />
                                    <img src="../img/courrier/2627.png" alt="26-27" />
                                    <img src="../img/courrier/28.png" alt="28" />
                                    <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                                    <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="xl-col-6 l-col-6 m-col-6 s-col-6"><img src="../img/courrier/noslide/couv.jpg" alt="couverture"></div>
                        <div class="xl-col-6 l-col-6 m-col-6 s-col-6"><img src="../img/courrier/noslide/interieur.jpg" alt="interieur"></div>
                        <!--fin section-->
                    </section>
                </div>
            </main>
            <!-- footer -->
            <?php 
		include('../include/footer.php');
	?>
    </body>

    </html>