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
    <title>Thomas portfolio</title>
    <?php 
    	include('include/head.php');
    ?>
</head>

<body class="contact">

    <!--Header-->
    <?php 
		include('include/header.php');
	?>
        <!-- Fin Header-->

        <?php 
			if( isset($_GET['Thanks'])){
				echo '<main><div class="success"><h4>Votre message a bien été envoyé.</h4></div></main>';
			}
		?>
            <main id="home">
                <div class="wrapper-form">
                    <section class="container gutters">
                        <div class="form xl-col-12 l-col-12">
                            <form action="traitement/send_contact.php" method="POST" class="contact">
                                <h3 class="center"><?php echo $lang['write']; ?></h3>
                                <div class="row">
                                    <div class="xl-col-12 nogutters">
                                        <div class="xl-col-4 champ">
                                            <input class="xl-col-12" type="text" name="prenom" placeholder="<?php echo $lang['name']; ?>" required>
                                        </div>
                                        <div class="xl-col-4 champ">
                                            <input class="xl-col-12" type="email" name="email" placeholder="<?php echo $lang['mail']; ?>" required>
                                        </div>
                                        <div class="xl-col-4 champ">
                                            <input class="xl-col-12" type="subject" name="subject" placeholder="<?php echo $lang['subject']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="xl-col-12 champ">
                                        <textarea class="xl-col-12" name="message" placeholder="<?php echo $lang['message']; ?>" required></textarea>
                                    </div>
                                    <div class="hp">
                                        <label><?php echo $lang['robot']; ?></label>
                                        <input type="text" name="comment">
                                    </div>
                                    <div id="cap" class="center"></div>
                                    <div class="l-col-12 m-col-12">
                                        <input class="l-col-2 l-offset-5 l-col-2 l-offset-5 m-col-2 m-offset-5" type="submit" placeholder="efef">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>

            </main>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="js/custom.js"></script>
</body>

</html>