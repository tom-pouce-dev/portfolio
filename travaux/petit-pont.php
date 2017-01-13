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
                    <h3><?php echo $lang['titrePetitPont']; ?></h3>
                    <p><?php echo $lang['textePetitPont']; ?></p>
                    <p>
                        <a href="../petit-pont/index.php" class="button" target='_blank'><?php echo $lang['linkPetitPont']; ?></a></p>
                </div>
                <!--fin section-->
            </section>
        </main>
        <!-- footer -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="../js/custom.js"></script>
</body>

</html>