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
                <div id="wrapper-background-acer">
                </div>
                <div id="wrapper-content">
                    <section class="container gutters fond">
                        <div class="xl-col-12">
                            <h3><?php echo $lang['titreAcer']; ?></h3>
                            <p>
                                <?php echo $lang['texteAcer']; ?>
                            </p>
                        </div>
                        <div class="xl-col-12">
                            <div id="slides">
                                <img src="../img/acer/slide-cdcf/acer-CDCF.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF2.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF3.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF4.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF5.jpg" alt="">
                                
                                <img src="../img/acer/slide-cdcf/acer-CDCF7.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF8.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF9.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF10.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF11.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF12.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF13.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF14.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF15.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF16.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF17.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF18.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF19.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF20.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF21.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF22.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF23.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF23.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF24.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF25.jpg" alt="">
                                
                                <img src="../img/acer/slide-cdcf/acer-CDCF27.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF28.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF29.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF30.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF31.jpg" alt="">
                                <img src="../img/acer/slide-cdcf/acer-CDCF32.jpg" alt="">

                                <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                                <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                            </div>
                            
                            <div id="slides2">
                                <img src="../img/acer/slide-cdct/acer-CDCT.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT2.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT3.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT4.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT5.jpg" alt="">
                                
                                <img src="../img/acer/slide-cdct/acer-CDCT7.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT8.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT9.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT10.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT11.jpg" alt="">
                                
                                <img src="../img/acer/slide-cdct/acer-CDCT13.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT14.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT15.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT16.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT17.jpg" alt="">
                                
                                <img src="../img/acer/slide-cdct/acer-CDCT19.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT20.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT21.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT22.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT23.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT23.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT24.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT25.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT26.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT27.jpg" alt="">
                                <img src="../img/acer/slide-cdct/acer-CDCT28.jpg" alt="">

                                <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                                <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                            </div>
                            
                            <div id="slides3">
                                <img src="../img/acer/slide-budget/Acer-Budget.jpg" alt="">
                                <img src="../img/acer/slide-budget/Acer-Budget2.jpg" alt="">
                                <img src="../img/acer/slide-budget/Acer-Budget3.jpg" alt="">
                                <img src="../img/acer/slide-budget/Acer-Budget4.jpg" alt="">
                                <img src="../img/acer/slide-budget/Acer-Budget5.jpg" alt="">
                                <img src="../img/acer/slide-budget/Acer-Budget6.jpg" alt="">
                                <img src="../img/acer/slide-budget/Acer-Budget7.jpg" alt="">
                                <img src="../img/acer/slide-budget/Acer-Budget8.jpg" alt="">

                                <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
                                <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
                            </div>
                            
                            <div id="slides4">
                                <img src="../img/acer/slide-planning/Acer-Planning.jpg" alt="">
                                <img src="../img/acer/slide-planning/Acer-Planning2.jpg" alt="">
                                <img src="../img/acer/slide-planning/Acer-Planning3.jpg" alt="">
                                <img src="../img/acer/slide-planning/Acer-Planning4.jpg" alt="">                    
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