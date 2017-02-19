<?php 
    include('config/settings-locale.php');

	$contact = $mysql->prepare('SELECT * FROM contact');
	$contact->execute();

    $data = $contact->fetch();

	$address = $data['adress'];

	$geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";
	$url_address = utf8_encode($address);
	$url_address = urlencode($url_address);
	$query = sprintf($geocoder, $url_address);
	$results = file_get_contents($query);
	$parsed_json = json_decode($results);
	$placeLat = $parsed_json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
	$placeLng = $parsed_json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

	$one1 = explode('.', $placeLat);
	$one1F = $one1[count($one1) - 2];

	$one2 = explode('.', $placeLat);
	$one2F = $one2[count($one2) - 1];


	$two1 = explode('.', $placeLng);
	$two1F = $two1[count($two1) - 2];

	$two2 = explode('.', $placeLng);
	$two2F = $two2[count($two2) - 1];

?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Antoine Barilt - Contactez-nous</title>
        <?php 
    	include('include/head.php');
    ?>
    </head>

    <body class="contact">
        <!-------------------->
        <!------ HEADER ------>
        <!-------------------->
        <?php 
		include('include/header.php');
	?>
            <!------------------------->
            <!-- HORRAIRES / ADRESSE -->
            <!------------------------->
            <div class="wrapper">
                <?php 
			if( isset($_GET['Thanks'])){
				echo '<h1 class="success center">Votre message a bien été envoyé, merci.</h1>';
			}
		?>
                    <main class="container gutters">
                        <article class="row pratique">
                            <div class="l-col-4 m-col-4 s-col-12 center">
                                <div class="row">
                                    <span class="icon-home3"></span>
                                </div>
                                <h2>Adresse</h2>
                                <p>
                                    <?php echo $data['adress']; ?>
                                </p>
                            </div>
                            <div class="l-col-4 m-col-4 s-col-12 center">
                                <div class="row">
                                    <span class="icon-phone"></span>
                                </div>
                                <h2>Téléphone</h2>
                                <p>
                                    <?php echo $data['phone']; ?>
                                </p>
                            </div>
                            <div class="l-col-4 m-col-4 s-col-12 center">
                                <div class="row">
                                    <span class="icon-calendar"></span>
                                </div>
                                <h2>Horaires</h2>
                                <p>
                                    <?php echo $data['opened']; ?>
                                </p>
                            </div>
                        </article>
                        <?php echo '<span class="Lat1">'.$one1F.'<span>
						<span class="Lat2">'.$one2F.'<span>
						<span class="Lng1">'.$two1F.'<span>
						<span class="Lng2">'.$two2F.'<span>'
			?>
                    </main>
            </div>
            <!--------------------------->
            <!------- GOOGLE MAPS ------->
            <!--------------------------->
            <div class="wrapper">
                <div id="carte"></div>
            </div>
            <!---------------------->
            <!----- FOMRULAIRE ----->
            <!---------------------->
            <div class="wrapper bleu">
                <div class="container gutters">
                    <h1 class="center">Un devis ou une question ?</h1>
                    <form action="traitement/send_contact.php" method="POST">
                        <div class="row">
                            <div class="l-col-12 nogutters">
                                <div class="l-col-4 form">
                                    <span class="icon-user"></span>
                                    <input class="l-col-12" type="text" name="prenom" placeholder="Nom et Prénom" required>
                                </div>
                                <div class="l-col-4 form">
                                    <span class="icon-envelop"></span>
                                    <input class="l-col-12" type="email" name="mail" placeholder="Mail" required>
                                </div>
                                <div class="l-col-4 form">
                                    <span class="icon-phone"></span>
                                    <input class="l-col-12" type="text" name="tel" placeholder="Téléphone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="xl-col-12 form">
                                <span class="icon-price-tag"></span>
                                <input class="l-col-12" type="text" name="objet" placeholder="Object" required>
                            </div>
                            <div class="l-col-12 form">
                                <span class="icon-bubble"></span>
                                <textarea class="l-col-12" name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="hp">
                                <label>Si vous êtes un humain, laissez ce champ vide</label>
                                <input type="text" name="comment">
                            </div>
                            <div id="cap" class="center"></div>
                            <div class="l-col-12 m-col-12">
                                <input class="l-col-2 l-offset-5 l-col-2 l-offset-5 m-col-2 m-offset-5" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-------------------->
            <!------ FOOTER ------>
            <!-------------------->
            <?php 
		include('include/footer.php');
	?>
    </body>

    </html>