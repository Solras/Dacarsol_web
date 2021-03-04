<?php
	// Abrir conexión a la BD
	include 'includes/conexion_bd.php';

	$id_juego=$_GET['id_juego'];

	$sql_j = "SELECT * FROM juegos WHERE id_juego = $id_juego";
	$result_j = $conn->query($sql_j);

	$sql_p = "SELECT id_juego FROM juegos WHERE id_juego = (SELECT max(id_juego) FROM juegos WHERE id_juego < $id_juego)";
	$result_p = $conn->query($sql_p);

	$sql_s = "SELECT id_juego FROM juegos WHERE id_juego = (SELECT min(id_juego) FROM juegos WHERE id_juego > $id_juego)";
	$result_s = $conn->query($sql_s);

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
						<div class="content">
							<?php
								$imagen = "";
								$nombre = "";
								$resumen = "";
								if ($result_j->num_rows > 0) {
									while($row = $result_j->fetch_assoc()) {
										$imagen = $row["imagen"];
										$nombre = $row["nombre"];
										$resumen = $row["resumen"];
										echo "
											<div>
												<h2>$nombre</h2>
											</div>
											<div class='juego'>
												<img src='./images/juegos/$imagen.png'>
											</div>
											<div class='juego'>
												<p>$resumen</p>
											</div>
										";
									}
								}
								else{
									echo "No hay juegos con ese ID";
								}
							?> 
						</div>
						<footer>
							<ul class="actions">
								<?php
									if ($result_p->num_rows > 0) {
										while($row = $result_p->fetch_assoc()) {
											$previo = $row["id_juego"];
											echo "
												<li><a href='juego.php?id_juego=$previo' class='button alt icon fa-chevron-left'><span class='label'>Previous</span></a></li>
											";
										}
									}
									else{
										echo "
											<li><a href='#' class='button alt icon fa-chevron-left'><span class='label'>Previous</span></a></li>
										";
									}

									if ($result_s->num_rows > 0) {
										while($row = $result_s->fetch_assoc()) {
											$siguiente = $row["id_juego"];
											echo "
												<li><a href='juego.php?id_juego=$siguiente' class='button alt icon fa-chevron-right'><span class='label'>Next</span></a></li>
											";
										}
									}
									else{
										echo "
											<li><a href='#' class='button alt icon fa-chevron-right'><span class='label'>Next</span></a></li>
										";
									}
								?>
							</ul>
						</footer>
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