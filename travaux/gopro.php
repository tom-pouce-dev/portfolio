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
        <section class="container gutters fond">
            <div class="xl-col-12">
                <h3><?php echo $lang['gopro']; ?></h3>
                <p><?php echo $lang['texteGoPro']; ?></p>
                <img src="../img/gopro/mag1.jpg" alt="intérieur magazine">
            </div>
            <div class="xl-col-6 l-col-6 m-col-6 s-col-12"><img src="../img/gopro/parking.jpg" alt="couverture"></div>
            <div class="xl-col-6 l-col-6 m-col-6 s-col-12"><img src="../img/gopro/gare.jpg" alt="gare"></div>
            <div class="xl-col-12"><img src="../img/gopro/mag2.jpg" alt="interieur magazine"></div>
            <!--fin section-->
        </section>
</main>
        <!-- footer -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../js/custom.js"></script>
</body>

</html>