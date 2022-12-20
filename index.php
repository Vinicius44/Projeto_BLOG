<?php
		
	include("config.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH?>css/estilo.css">
	<title>Projeto Noticia</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sono&family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>

	<base base="<?php INCLUDE_PATH ?>"></base>

	<?php

		$url = isset($_GET["url"]) ? $_GET["url"] : "inicio";

	?>

	<header>
		<div class="center">
			<h1>Noticias.com</h1>
		</div><!--center-->
	</header>


	<section>

		<div class="center">
			<?php
				
				if(file_exists("pages/".$url.".php")){
					include("pages/".$url.".php");
				}else if(file_exists("pages/painel/".$url.".php")){
					include("pages/painel/".$url.".php");

				}else{

					if($url != "cadastrar_categorias" && $url != "cadastrar_noticias" && $url != "menu_painel"){

						$urlPar = explode("/", $url)[0];

						if($urlPar != "menu_principal"){
							include("pages/nãoExiste.php");
						}else{
							include("pages/menu-principal.php");
						}


					}

					
				}


			?>

		</div>
		
	</section>

	<!--<footer>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-
	</footer>-->

	<script type="text/javascript" src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>


	<?php 

		if(strstr($url[0], "menu_principal") !== false){
		echo "<p>".strstr($url)."</p>";


	?>

	<script>
		
		$(function(){

			alert("boa");
			/*$("select").change(function(){
				location.href = include_path+"menu_principal/".$(this).val;
			})*/
		})


	</script>

	<?php 

		}

	?>

	<script src="https://cdn.tiny.cloud/1/ltn5cqnmnoy52w8zjqaaf49lyg1j27mu3x7b8ciupxsm2cxy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: '.tinymce',
			//plugins: 'image',

		});
	</script>

</body>
</html>