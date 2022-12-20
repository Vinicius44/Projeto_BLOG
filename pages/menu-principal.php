<?php 

	

		$url2 = explode("/", $_GET['url']);
		if(!isset($url2[2])){

		if($url2[1] == ""){

		}else{

		}

	
?>



<div class="sidebar">
	<h4>Selecionar categorias:</h4>
	
	<form method="get">
	<select>
		<option value="" disabled selected="">Todas as noticias</option>

		<?php  

			$categorias = Painel::selectAll("tb_site.categorias");
			
			foreach ($categorias as $key => $value) {
			
			



		?>


		<option <?php if($value["slug"] == @$url2[1]) echo "selected"?>  value="<?php echo $value["slug"]?>"><?php echo $value["nome"] ?></option>



		<?php 



			}

		?>

	</select>

</div><!--sidebar-->


<div class="noticias-principais">

	<?php
		if($url2[1] == ""){
			echo "<h2>Notícias Principais</h2>";
			$noticias = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias`");	
			$noticias->execute();
		}else{


			$categoriaNome = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
			$categoriaNome->execute(array($url2[1]));
			

			if($categoriaNome->rowCount() == 1){
				echo "<h2>Notícias de ".$url2[1]."</h2>";
				$categoriaNome = $categoriaNome->fetch();
				@define("ID", $categoriaNome["id"]);
				$noticias = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE categoria_id = ?");	
				$noticias->execute(array(ID));
				
				
			}else{
				echo "<h2>Notícias Principais</h2>";
				
			}
			//$idCategoria = $categoriaNome["id"];
			//print_r($categoriaNome["id"]);
			
			
		}
		




		foreach ($noticias as $key => $value) {
			$sql = Mysql::conectar()->prepare("SELECT `slug` FROM `tb_site.categorias` WHERE id = ?");
			$sql->execute(array($value["categoria_id"]));
			$categoriaNome = $sql->fetch()["slug"];
?>		

	<div class="base_noticia">
			<h4 class="titulo"><?php echo $value["titulo"]; ?></h4>

		<p class="texto"><?php echo substr(strip_tags($value["conteudo"]), 0, 400)."...";?></p>

		<a href="<?php echo INCLUDE_PATH; ?>menu_principal/<?php echo $categoriaNome;?>/<?php echo $value["slug"]; ?>">Ver mais</a>
	</div><!--base-noticia-->


<?php  } ?>

	


	

	


</div><!--noticias-principais-->

<div class="clear"></div>

<?php 

	}else{
		include("noticia_single.php");
	}

?>
