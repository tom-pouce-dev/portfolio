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
        <?php 
    	include('include/head.php');
    ?>
    </head>

    <body>

        <!--Header-->
        <?php 
		include('include/header.php');
	?>
            <!-- Fin Header-->

            <!--Div infos-->
            <main id="home">
                <div class="wrapper-info">
                    <section class="container gutters">
                        <div class="xl-col-12">
                            <div class="info">
                                <h1>Thomas Werkmeister</h1>
                                <h1><?php echo $lang['title']; ?></h1>
                            </div>
                        </div>
                        <!-- Fin Div infos-->
                    </section>
                </div>
            </main>
            <!--
        <footer class="wrapper">
            <div class="container gutters footer-in"> Nouveau site en développement pour mi-novembre 2016.</div>
        </footer>
-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="js/custom.js"></script>
    </body>

    </html>