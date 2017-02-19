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
                <div id="wrapper-background-animaux">
                </div>
                <div id="wrapper-content">
                    <section class="container gutters fond">
                        <div class="xl-col-12">
                            <h3>Les animaux en page</h3>
                            <p>Les éditions du Rouerge décident de lancer une nouvelle collection qui regroupe des extraits littéraires traitant du thème des animaux. Chaque livre sera consacré à un animal. Cette collection s’adresse à un public de curieux de 15 à 77 ans s’intéressant à la littérature et plus spécifiquement aux animaux.
                                <br>
                                <br> Le ton se doit d’être moderne et adulte. L’objectif est de sentir le rapport entre le texte et l’animal. Il est demandé au départ de travailler sur trois titres que sont : le chat en pages, l’oiseau en pages et le cheval en pages.
                                <br>
                                <br> J'ai décidé de partir sur des visuels où la silhouette des animaux est dessinée par des lignes qui rappellent les lignes d'écriture. J’ai choisis comme typographie un Bradley Hand qui est une scripte et qui fait le lien avec la littérature. J’ai associé à cette typographie l'Orator pour son aspect moderne qui correspond à la demande du client.
                            </p>
                        </div>
                        <div class="row">
                            <div class="xl-col-4 l-col-4 m-col-4 s-col-12">
                                <img src="../img/animaux/chat.jpg" alt="chat couverture">
                            </div>
                            <div class="xl-col-4 l-col-4 m-col-4 s-col-12">
                                <img src="../img/animaux/oiseau.jpg" alt="oiseau couverture">
                            </div>
                            <div class="xl-col-4 l-col-4 m-col-4 s-col-12"><img src="../img/animaux/cheval.png" alt="cheval couverture"></div>
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