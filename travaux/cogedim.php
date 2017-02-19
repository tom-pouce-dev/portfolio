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
                <div id="wrapper-background-cogedim" class="wrapper-background-cogedim">
                </div>
                <div id="wrapper-content">
                    <section class="container gutters fond">
                        <div class="xl-col-12">
                            <h3><?php echo $lang['cogedim']; ?></h3>
                            <p>
                                <?php echo $lang['texteCogedim']; ?>
                            </p>
                        </div>
                        <div class="xl-col-12">
                            <img src="../img/cogedim/tablette.png" alt="tablette">
                        </div>
                        <!--fin section-->
                    </section>
                </div>
            </main>
            <!-- footer -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="../js/custom.js"></script>
    </body>

    </html>