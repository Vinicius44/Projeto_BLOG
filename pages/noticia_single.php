
<?php


	$urlCat = explode("/", $_GET['url'])[1];
	$urlNot = explode("/", $_GET['url'])[2];


	$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE slug = ?");
	$sql->execute(array($urlCat));

	if($sql->rowCount() == 1){
		
		$sql2 = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE slug = ?");
		$sql2->execute(array($urlNot));
		

		if($sql2->rowCount() == 1){

			foreach ($sql2 as $key => $value) {
				
			

		


?>




<div class="noticia-single">
	<h1><?php echo $value["titulo"] ?></h1>
	<article>
		
		<?php echo $value["conteudo"]; ?>



	</article>



</div>



<?php 

			}

		}






	}

?>