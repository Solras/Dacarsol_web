<?php
	// Abrir conexión a la BD
	include 'includes/conexion_bd.php';

	$sql = "SELECT * FROM juegos";

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
	</head>
	<body class="subpage">


		<!-- Header y nav -->
		<?php include 'includes/header.php'; ?>

		<!-- Content -->
		<!--
			Note: To show a background image, set the "data-bg" attribute below
			to the full filename of your image. This is used in each section to set
			the background image.
		-->
			<section id="post" class="wrapper bg-img" data-bg="banner_juego.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Juegos</h2>
							<!-- <p>01.01.2017</p> -->
						</header>
						<div class="content">
							<div class="row 50% uniform">
							<?php
								$imagen = "";
								$nombre = "";
								$id_juego = "";
								if ($result->num_rows > 0) {
									$rows = $result->num_rows;
									for($i=1; $i<=$rows; $i++){
										$row = $result->fetch_assoc();
										$imagen=$row["imagen"];
										$nombre=$row["nombre"];
										$id_juego=$row["id_juego"];

										$cadena = "";
										$cadena = ($i%3 == 0)?"$":"";
										echo "
											<div class='4u".$cadena."'>
												<div class='image fit'>
													<a href='juego.php?id_juego=$id_juego'>
														<img src='./images/juegos/$imagen.png'>$nombre
													</a>
												</div>
											</div>
										";
									}
								}
							?>
							</div>
						</div>
					</article>
				</div>
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