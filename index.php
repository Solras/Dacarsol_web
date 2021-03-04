<?php
	// Abrir conexión a la BD
	include 'includes/conexion_bd.php';

	$sql = "SELECT * FROM juegos ORDER BY crea_date DESC LIMIT 4";

	$result = $conn->query($sql);	

	//Cerrar conexión a la BD
	$conn->close();
?>

<!DOCTYPE HTML>
<!--
	Road Trip by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Dacarsol</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	</head>
	<body>

		
		<!-- Header y nav -->
		<?php include 'includes/header.php'; ?>

		<!-- Banner -->
		<!--
			Note: To show a background image, set the "data-bg" attribute below
			to the full filename of your image. This is used in each section to set
			the background image.
		-->
			<section id="banner" class="bg-img" data-bg="fondo_mano.jpg">
				<div class="inner">
					<header>
						<img id="logo-portada" src="./images/logo.png" alt="logotipo: cinco cartas detras y un dado delante. Debajo la palabra Dacarsol"/>
						<!-- <h1>This is Road Trip</h1> -->
					</header>
				</div>
				<a href="#one" class="more">Learn More</a>
			</section>

		<!-- One -->
			<section id="one" class="wrapper post bg-img" data-bg="banner_juego.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Juegos</h2>
							<p>Últimas novedades</p>
						</header>
						<div class="content">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Carousel indicators -->
								<ol class="carousel-indicators">
									<?php
										if ($result->num_rows > 0) {
											$rows = $result->num_rows;
											for($i=0; $i<$rows; $i++){
												$cadena = "";
												$cadena = ($i == 0)?" class='active'></li>":"></li>";
												echo"<li data-target='#myCarousel' data-slide-to='$i'".$cadena;
											}
										}
									?>
								</ol>
								<!-- Wrapper for carousel items -->
								<div class="carousel-inner">
									<?php
										$imagen = "";
										$nombre = "";
										if ($result->num_rows > 0) {
											$rows = $result->num_rows;
											for($i=0; $i<$rows; $i++){
												$row = $result->fetch_assoc();
												$imagen=$row["imagen"];
												$nombre=$row["nombre"];

												$cadena = "";
												$cadena = ($i == 0)?" active":"";
												echo "<div class='carousel-item".$cadena."'>
													<img src='images/juegos/$imagen.png' alt='Slide'>
													
												</div>";
											}
										}
									?>
								</div>
								<!-- Carousel controls -->
								<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
								</a>
								<a class="carousel-control-next" href="#myCarousel" data-slide="next">
									<span class="carousel-control-next-icon"></span>
								</a>
							</div>
						</div>
						<footer>
							<a href="lista_juegos.php" class="button alt">Ver más</a>
						</footer>
					</article>
				</div>
				<a href="#two" class="more">Learn More</a>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper post bg-img" data-bg="banner_elementos.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Elementos</h2>
						</header>
						<div class="content">
							<p>Aunque los juegos de mesa están contenidos en una caja, la experiencia tiene muchas partes intangibles. ¿Qué ideas intangibles componen un juego de mesa? Vamos a intentar analizar un poco algunos dominios comunes entre los juegos de mesa. Metas, acciones, manejo de recursos...</p>
						</div>
						<footer>
							<a href="elementos.php" class="button alt">Ver más</a>
						</footer>
					</article>
				</div>
				<a href="#three" class="more">Learn More</a>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper post bg-img" data-bg="banner_imprenta.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Editoriales</h2>
						</header>
						<div class="content">
							<p>Hay muchas editoriales de juegos de mesa y con la globalización y el internet cada vez resulta más fácil comunicarse con ellas alrededor del planeta pero aquí tenemos enlaces de las más importantes a nivel nacional.</p>
						</div>
						<footer>
							<a href="editoriales.php" class="button alt">Ver más</a>
						</footer>
					</article>
				</div>
				<a href="#footer" class="more">Learn More</a>
			</section>


		<!-- Footer -->
		<?php include 'includes/footer.html'; ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>