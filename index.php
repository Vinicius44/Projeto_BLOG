<?php
		
	include("config.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title>Projeto Noticia</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sono&family=Ubuntu&display=swap" rel="stylesheet">
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
				}else if($url == "menu_painel"){
					include("pages/painel/menu_painel.php");
				}else if($url == "cadastrar_categorias"){
					include("pages/painel/cadastrar_categorias.php");
				}else if($url == "cadastrar_noticias"){
					include("pages/painel/cadastrar_noticias.php");
				}

			?>

		</div>
		
	</section>

	<footer>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>

	<script src="https://cdn.tiny.cloud/1/ltn5cqnmnoy52w8zjqaaf49lyg1j27mu3x7b8ciupxsm2cxy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: '.tinymce',
			//plugins: 'image',

		});
	</script>

</body>
</html>