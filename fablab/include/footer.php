<?php
	//on fait les appels dans la DB
	$media = $mysql->prepare('SELECT * FROM social');
	$media->execute();

	$social = $media->fetch();
?>
<footer class="wrapper">	
	<div class="container gutters">
		<div class="l-col-3 m-col-3 s-col-12"><h3>Antoine Barilt - 2015</h3></div>
		<div class="l-col-3 m-col-3 s-col-12"><h3><a href="partenaires.php">Partenaires</a></h3></div>
		<div class="l-col-3 m-col-3 s-col-12"><h3><a href="mentions.php">Mentions légales</a></h3></div>
		<div class="l-col-3 m-col-3 s-col-12">
			<h3>Réseaux Sociaux</h3>
			<a href="<?php echo $social['twitter']; ?>"><span class="icon-twitter2"></span></a>
			<a href="<?php echo $social['facebook']; ?>"><span class="icon-facebook2"></span></a>
			<a href="<?php echo $social['pinterest']; ?>"><span class="icon-pinterest2"></span></a>
			<a href="<?php echo $social['youtube']; ?>"><span class="icon-youtube"></span></a>
		</div>
	</div>
</footer>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src='js/jquery.magnific-popup.min.js'></script>
<script src="js/custom.js"></script>
<?php 
    include_once("analyticstracking.php");
?>
