<?php
 
if($_POST) {
	$nombre = "";
	$email = "";
	$asunto = "";
	$mensaje = "";
	$para = "carlosmariabt@gmail.com";

	//https://www.php.net/manual/es/function.filter-var.php
	//FILTER_SANITIZE_STRING==>Me quedo con el contenido "bueno"
	// preguntar por name de html
	if(isset($_POST['nombre'])) {
		$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	}

	if(isset($_POST['email'])) {
	//https://www.php.net/manual/es/function.str-replace.php
		$email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	if(isset($_POST['asunto'])) {
		$asunto = filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);
	}

	if(isset($_POST['mensaje'])) {
	//https://www.php.net/manual/es/function.htmlspecialchars.php
		$mensaje = htmlspecialchars($_POST['mensaje']);
	}

	$headers  = 'MIME-Version: 1.0' . "\r\n"
	.'Content-type: text/html; charset=utf-8' . "\r\n"
	.'From: ' . $email . "\r\n";

	//https://www.php.net/manual/es/function.mail.php
	if(mail($para, $asunto, $mensaje, $headers)) {
	echo "<p>Tu mensaje se ha enviado correctamente</p>";
	} else {
	echo '<p>Lo sentimos, no hemos podido enviar el mensaje</p>';
	}

} else {
echo '<p>Something went wrong</p>';
}

?>