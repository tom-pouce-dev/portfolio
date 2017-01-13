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
                    <h3><?php echo $lang['titreNosywise']; ?></h3>
                    <p><?php echo $lang['texteNosywise']; ?></p>
                </div>
                <div class="xl-col-12">
                    <div id="slides">
                        <img src="../img/nosywise/slide/nosywise.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise2.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise3.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise4.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise5.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise6.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise7.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise8.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise9.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise10.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise11.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise12.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise13.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise14.jpg" alt="">
                        <img src="../img/nosywise/slide/nosywise15.jpg" alt="">
                        <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                        <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                    </div>
                </div>
                <!--fin section-->
            </section>
        </main>
        <!-- footer -->
            <?php 
		include('../include/footer.php');
	?>
</body>

</html>