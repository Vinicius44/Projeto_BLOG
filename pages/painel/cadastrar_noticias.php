<div class="cadastrar_not">

	<form method="post" enctype="multipart/form-data">
	<div class="container_cad">	
		<label class="w100">Categoria:</label>
		<select class="w100" name="categoria_id">
			
			<?php 
				
				$categorias = Painel::selectAll("tb_site.categorias");

				foreach ($categorias as $key => $value){
					
				


			?>

			<option value="<?php echo $value["id"]?>"><?php  echo $value["nome"];?></option>



		<?php } ?>
					
				
			
		</select>
	</div>

	 <div class="container_cad">
	 	<label>Titulo:</label>
	 	<input class="w100" type="text" name="titulo" >
	 </div><!--container_cad-->

	<div class="container_cad">
	 	<label>Conteudo:</label>
		<textarea class="tinymce" name="conteudo"></textarea>
	</div><!--container_cad-->



	 <div class="container_cad">
	 	
	 	<input class="w100" type="submit" name="acao" value="Cadastrar Notícia">
	 	<input class="w100" type="hidden" name="tabela" value="tb_site.noticias">
	 </div><!--container_cad-->

	 </form>


	 <?php 

	 	if(isset($_POST["acao"])){
	 		$categoria_id = $_POST['categoria_id'];
	 		$titulo = $_POST["titulo"];
	 		$conteudo = $_POST["conteudo"];
	 		
	 	


	 		if($conteudo == "" || $titulo == ""){
	 			echo "Erro, todos os campos não foram preenchidos!";
	 		
	 		}else{

	 				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_site.noticias` WHERE titulo = ? AND categoria_id = ?");
	 				$sql->execute(array($titulo, $categoria_id));

	 				if($sql->rowCount() == 0){
	 					$imagemNome = "i.png";
	 					$slug = Painel::generateSlug($titulo);

	 					$arr = ["categoria_id" => $categoria_id, "titulo" => $titulo, "conteudo" => $conteudo, "imagem" => $imagemNome, "slug" => $slug, "tabela" => "tb_site.noticias"];

	 					$noticia = Painel::insert($arr);

	 					echo '<p style="font-family: sans-serif;">A noticia foi armazenada com sucesso!</p>';


	 			}
	 		


	 		}
	 	}

	 ?>


</div><!--cadastrar_not-->