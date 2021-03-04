<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dacarsol";

	/************************CONEXION********************************************/
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Conexión incorrecta: " . $conn->connect_error);
	}
?>
