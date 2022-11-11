<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Projeto Noticia</title>
</head>
<body>


	<?php

		$url = isset($_GET["url"]) ? $_GET['url'] : "menu-principal";

	?>

	<header>
		<div class="center">
			<h1>Noticias.com</h1>
		</div><!--center-->
	</header>


	<section>

		<div class="center">
			<?php

				if($url == "menu-principal"){
					include("pages/menu-principal.php");
				}

			?>

		</div>
		
	</section>

	<footer>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>


</body>
</html>