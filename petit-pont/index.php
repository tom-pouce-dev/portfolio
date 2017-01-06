<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Petit pont</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <header id="header">
        <div class="header-content container">
            <div class="header-nav">
                <div class="header-logo">
                    <a href="#">
                        <img src="img/logo.png" alt="logo" />
                    </a>
                </div>
                <nav class="header-navigation">
                    <ul>
                        <li><a id="href-bloc-1" href="#wrapper-product" class="current animated js-scrollTo">Produit</a></li>
                        <li class="nav-center"><a id="href-bloc-2" href="#wrapper-table" class="animated js-scrollTo">Joueurs</a></li>
                        <li><a id="href-bloc-last" href="#wrapper-bar" class="animated js-scrollTo">Bars</a></li>
                        <!--                        <li><a id="href-bloc-bloc" href="#wrapper-notice" class="animated js-scrollTo">Avis</a></li>-->
                    </ul>
                </nav>
            </div>
            <div class="header-bouton">
                <a href="#wrapper-precommande" class="btn-yellow js-scrollTo">Précommander</a>
                <a href="indexpro.php" class="btn-blue">Espace professionnel</a>
            </div>
        </div>
    </header>

    <!-- --------------------WRAPPER ANONCE SLIDER------------------------- -->

    <div class="wrapper-slider owl-carousel owl-theme owl-loaded">
        <div id="slider-items" class="owl-stage-outer">
            <div class="item" style="background-image:url(img/slider/slider1.jpg)"></div>
            <div class="item" style="background-image:url(img/slider/slider2.jpg)"></div>
            <div class="item" style="background-image:url(img/slider/slider3.jpg)"></div>
        </div>
        <div class="slider-annonce">
            <h1>Prouve que le meilleur <br>supporter c'est toi !</h1>
            <h2> Faites des pronostics sur l'avancement du match.<br>
            Mettez des petits ponts et montrez votre supériorité !</h2>
        </div>
    </div>

    <!-- -------------------------WRAPPER ANONCE------------------------- -->

    <div class="wrapper-product" id="wrapper-product">
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Une enceinte connectée pour jouer entre amis</h2>
                </div>
                <div class="col-md-5">
                    <p>Grâce à l'enceinte connectée Petit Pont, pari en direct avec tes amis sur les matchs de ton choix. </p>
                </div>
                <div class="col-md-7">
                    <div class="speaker"><img src="img/speaker.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------WRAPPER PRECO------------------------- -->

    <div class="wrapper-precommande" id="wrapper-precommande">
        <div class="container">
            <h2>Precommande dès maintenant l'enceinte</h2>
            <p>Ne perde pas de temps. Précommande dès maintenant l'enceinte connectée Petit Pont.</p>
            <div>
                <form action="action_page.php">
                    <fieldset>
                        <input type="text" id="pseudo" name="pseudo" placeholder="Nom">
                        <input type="text" id="mail" name="mail" placeholder="Adresse mail">
                        <input type="submit" value="Précommander" class="btn-yellow">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <!-- -------------------------WRAPPER TABLEAU------------------------- -->

    <div class="wrapper-table" id="wrapper-table">
        <div class="container table-content">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Vient défier les meilleurs joueurs de Petit Pont</h2></div>
                <div class="col-md-6">
                    <div class="top">
                        <div class="top-first">
                            <div class="top-trophee">
                                <img src="img/first.png" alt="">
                            </div>
                            <div class="top-name">
                                <h2>La Mannschaft</h2>
                                <p>5000 petits ponts</p>
                            </div>
                        </div>
                        <div class="top-second">
                            <div class="top-trophee">
                                <img src="img/second.png" alt="">
                            </div>
                            <div class="top-name">
                                <h2>La Mannschaft</h2>
                                <p>5000 petits ponts</p>
                            </div>
                        </div>
                        <div class="top-third">
                            <div class="top-trophee">
                                <img src="img/third.png" alt="">
                            </div>
                            <div class="top-name">
                                <h2>La Mannschaft</h2>
                                <p>5000 petits ponts</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Petits ponts mis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Osef</td>
                                <td>504</td>
                            </tr>
                            <tr>
                                <td>Mary</td>
                                <td>480</td>
                            </tr>
                            <tr>
                                <td>July</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>July</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>July</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>July</td>
                                <td>400</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- -------------------------BAR------------------------- -->

    <div class="wrapper-bar" id="wrapper-bar">
        <div class="container">
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-12">
                    <h2>Les meilleurs bars</h2>
                </div>

                <div class="col-md-4 bar-texte">
                    <p>Retrouve près de chez toi, les bars avec la meilleur ambiance. Viens rejoindre les amateurs de petits ponts et défie les autres bars.</p>
                </div>
                <div class="col-md-8 bar-map">
                    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                    <div style='overflow:hidden;height:440px;width:700px;'>
                        <div id='gmap_canvas' style='height:440px;width:700px;'></div>
                        <div><small><a href="http://embedgooglemaps.com">									google maps carte							</a></small></div>
                        <div><small><a href="http://www.youtubeembedcode.com">generate youtube code</a></small></div>

                    </div>
                    <script type='text/javascript'>
                        function init_map() {
                            var myOptions = {
                                zoom: 10,
                                center: new google.maps.LatLng(48.88309232916978, 2.3580583868164418),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                            marker = new google.maps.Marker({
                                map: map,
                                position: new google.maps.LatLng(48.88309232916978, 2.3580583868164418)
                            });
                            infowindow = new google.maps.InfoWindow({
                                content: '<strong>Titre</strong><br>Paris, France<br>'
                            });
                            google.maps.event.addListener(marker, 'click', function () {
                                infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------FOOTER------------------------- -->
    <?php 
		include('include/footer.php');
	?>



        <!-- /container -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>
            window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
        </script>

        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
</body>

</html>