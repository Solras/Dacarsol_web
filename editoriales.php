<?php
	// Abrir conexión a la BD
	include 'includes/conexion_bd.php';

	$sql = "SELECT * FROM editoriales";

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
			<section id="post" class="wrapper bg-img" data-bg="banner_imprenta.jpg">
				<div class="inner">
					<article class="box">
						<header>
							<h2>Editoriales</h2>
						</header>
						<div class="content">
							<div class="row 50% uniform">
							<?php
								$imagen = "";
								$nombre = "";
								$enlace = "";
								if ($result->num_rows > 0) {
									$count = 1;
									while($row = $result->fetch_assoc()) {
										$imagen=$row["logo"];
										$nombre=$row["nombre"];
										$enlace=$row["enlace"];
										if($count % 3 != 0){
											echo "
												<div class='4u'>
													<div class='image fit'>
														<a href='$enlace' target='blanc'>
															<img src='./images/editoriales/$imagen.jpg'>
															$nombre
														</a>
													</div>
												</div>
											";
										} else {
											echo "
												<div class='4u$'>
													<div class='image fit'>
														<a href='$enlace' target='blanc'>
															<img src='./images/editoriales/$imagen.jpg'>
															$nombre
														</a>
													</div>
												</div>
											";
										}
										$count++;
									}
								}
								else{
									echo "No hay juegos así";
								}
							?>
							</div>
						</div>
						<!-- <footer>
							<ul class="actions">
								<li><a href="#" class="button alt icon fa-chevron-left"><span class="label">Previous</span></a></li>
								<li><a href="#" class="button alt icon fa-chevron-right"><span class="label">Next</span></a></li>
							</ul>
						</footer> -->
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