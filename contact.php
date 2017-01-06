<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Thomas portfolio</title>
    <?php 
    	include('include/head.php');
    ?>
</head>

<body class="wrapper1">

    <!--Header-->
    <?php 
		include('include/header.php');
	?>
        <!-- Fin Header-->

        <?php 
			if( isset($_GET['Thanks'])){
				echo '<h1 class="success">Votre message a bien été envoyé, merci.</h1>';
			}
		?>
            <main id="home">
                <div class="wrapper-form">
                    <section class="container gutters">
                        <div class="xl-col-12">
<!--
                            <div class="form">
                                <h3 class="center">Contactez-moi</h3>
                                <p><a href="mailto:werkmeister.thomas.michael@gmail.com" target="_blank">werkmeister.thomas.michael@gmail.com</a></p>
                            </div>
-->

                            
                               <div class="form">
                                <form action="traitement/send_contact.php" method="post">
                                    <h3 class="center">Contactez-moi</h3>
                                    <div class="row">
                                        <div class="xl-col-4">
                                            <input type="text" name="objet" placeholder="Object" required>
                                        </div>
                                        <div class="xl-col-4">
                                            <input type="text" name="prenom" placeholder="Nom" required>
                                        </div>
                                        <div class="xl-col-4">
                                            <input type="email" name="mail" placeholder="Mail" required>
                                        </div>
                                    </div>
                                    <div class="xl-col-12">
                                        <textarea name="message" placeholder="Message" required></textarea>
                                    </div>
                                    <div class="hp">
                                        <label>Si vous êtes un humain, laissez ce champ vide</label>
                                        <input type="text" name="comment">
                                    </div>
                                    <div class="xl-col-12 m-col-12">
                                        <input class="l-col-2 l-offset-5 l-col-2 l-offset-5 m-col-2 m-offset-5" type="submit">
                                    </div>
                                </form>
                                </div>

                        </div>
                    </section>
                </div>
            </main>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="js/custom.js"></script>
</body>

</html>