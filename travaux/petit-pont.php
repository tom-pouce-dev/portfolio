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
                <div id="wrapper-background-petitpont">
                </div>
                <div id="wrapper-content">
                    <section class="container gutters fond">
                        <div class="xl-col-12">
                            <h3><?php echo $lang['titrePetitPont']; ?></h3>
                            <p>
                                <?php echo $lang['textePetitPont']; ?>
                            </p>
                            <a href="../petit-pont/index.php" class="button" target='_blank'>
                                        <?php echo $lang['linkPetitPont']; ?>
                                    </a>
                            </div>
                            
                            <div class="xl-col-12">
                                <div id="slides">
                                    <img src="../img/petitpont/slide/petit.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit2.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit3.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit4.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit5.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit6.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit7.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit8.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit9.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit10.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit11.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit12.jpg" alt="">
                                    <img src="../img/petitpont/slide/petit13.jpg" alt="">

                                    <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                                    <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                                </div>
                            </div>
                        
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