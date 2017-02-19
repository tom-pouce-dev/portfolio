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
                <div id="wrapper-background-blindate">
                </div>
                <div id="wrapper-content">
                    <section class="container gutters fond">
                        <div class="xl-col-12">
                            <h3><?php echo $lang['titreBlindate']; ?></h3>
                            <p>
                                <?php echo $lang['texteBlindate']; ?>
                            </p>
                            <a href="../blindate/index.html" class="button" target='_blank'>
                                        <?php echo $lang['linkPetitPont']; ?>
                                    </a>
                            </div>
                            
                            <div class="xl-col-12">
                                <img src="../img/blindate/blindate2.jpg" alt="">
                                <!--<a href="adidas.php" class="link-adidas">adidas</a>-->
                                
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