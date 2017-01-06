<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Thomas Portfolio</title>

		<meta name="description" content="Thomas Werkmeister portfolio">

		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/grid12.css">
		<link rel="stylesheet" href="css/custom.css">
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta name="viewport" content="width=device-width">
	</head>
	<body class="wrapper1">
	
    <!--Header-->
	<?php 
		include('../include/headerwork.php');
	?>
    <!-- Fin Header-->

<main>
		<div class="xl-col-4 l-col-4 m-col-4 s-col-12"><img src="img/img2.png" alt="img2"></div>
		<div class="xl-col-8 l-col-8 m-col-8 s-col-12"><img src="img/portfolio/Courrier.jpg" alt="img1"></div>

	<!--bloc 4 images-->
		<section class="xl-col-8 l-col-8  m-col-8 s-col-12 nogutters">
			<div class="xl-col-12 l-col-12 m-col-12">
				<img src="img/img4.png" alt="img4">
			</div>

			<div class="xl-col-6 l-col-6 m-col-6 s-col-12">
				<img src="img/img5.png" alt="img5">
			</div>

			<div class="xl-col-6 l-col-6 m-col-6 s-col-12">
				<img src="img/img6.png" alt="img6">
			</div>
		</section>
		<div class="xl-col-4 l-col-4 m-col-4 s-col-12">
			<img src="img/car.png" alt="img3"> 	<!--grande image vertical-->
		</div>
	<!--fin section-->
	
</main>

	<!-- lightbox -->

	<div class="lightbox">
		<div class="imagebox">
			<div class="image">
				<img src="img/img1.png">
			</div>
			<span>x</span>
		</div>
	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="js/custom.js"></script>
	</body>
</html>