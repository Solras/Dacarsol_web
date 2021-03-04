<!-- Header -->
			<header id="header"<?php if ($_SERVER['PHP_SELF'] != '/Dacarsol/index.php'){ echo "class='alt'"; }?>>
				<?php 
					if ($_SERVER['PHP_SELF'] != '/Dacarsol/index.php'){
				?>
				<div class="logo">
					<a href="index.php">
						<img src="./images/logo.png" alt="logotipo: cinco cartas detras y un dado delante. Debajo la palabra Dacarsol"/>
					</a>
				</div>
				<?php
					}
				?>
				<a href="#menu"><span>Menu</span></a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Inicio</a></li>
					<li><a href="lista_juegos.php">Juegos</a></li>
					<li><a href="elementos.php">Elementos</a></li>
					<li><a href="editoriales.php">Editoriales</a></li>
				</ul>
			</nav>

