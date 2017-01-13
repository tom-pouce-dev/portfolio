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

        <main>
            <section class="container gutters fond">
                <div class="xl-col-12">
                    <h3><?php echo $lang['adidas']; ?></h3>
                    <p><?php echo $lang['texteAdidas']; ?></p>
                    <!--         SLIDER   -->
                    <div class="xl-col-12">
                        <div id="slides">

                                <img src="../img/adidas/slide/1.png" alt="1" />
                                <img src="../img/adidas/slide/23.png" alt="2-3" />
                                <img src="../img/adidas/slide/45.png" alt="4-5" />
                                <img src="../img/adidas/slide/67.png" alt="6-7" />
                                <img src="../img/adidas/slide/89.png" alt="8-9" />
                                <img src="../img/adidas/slide/1011.png" alt="10-11" />
                                <img src="../img/adidas/slide/1213.png" alt="12-13" />
                                <img src="../img/adidas/slide/1415.png" alt="14-15" />
                                <img src="../img/adidas/slide/1617.png" alt="16-17" />
                                <img src="../img/adidas/slide/1819.png" alt="18-19" />
                                <img src="../img/adidas/slide/2021.png" alt="20-21" />
                                <img src="../img/adidas/slide/2223.png" alt="22-23" />
                                <img src="../img/adidas/slide/2425.png" alt="24-25" />
                                <img src="../img/adidas/slide/2627.png" alt="26-27" />
                                <img src="../img/adidas/slide/2829.png" alt="28-29" />
                                <img src="../img/adidas/slide/3031.png" alt="30-31" />
                                <img src="../img/adidas/slide/3233.png" alt="32-33" />
                                <img src="../img/adidas/slide/3435.png" alt="34-35" />
                                <img src="../img/adidas/slide/3637.png" alt="36-37" />
                                <img src="../img/adidas/slide/3839.png" alt="38-39" />
                                <img src="../img/adidas/slide/4041.png" alt="40-41" />
                                <img src="../img/adidas/slide/4243.png" alt="42-43" />
                                <img src="../img/adidas/slide/44.png" alt="44" />
                                <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                                <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>

                        </div>
                    </div>
                    <!--        FIN SLIDER      -->
                </div>
                <div class="xl-col-6 l-col-6 m-col-6 s-col-12"><img src="../img/adidas/couv.jpg" alt="couverture"></div>
                <div class="xl-col-6 l-col-6 m-col-6 s-col-12"><img src="../img/adidas/interieur.jpg" alt="interieur"></div>

                <!--fin section-->
            </section>
        </main>
        <!-- footer -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../js/custom.js"></script>
        <script src="../js/jquery.slides.min.js"></script>
</body>

</html>