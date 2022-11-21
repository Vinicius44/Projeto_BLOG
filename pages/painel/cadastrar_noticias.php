<div class="cadastrar_not">

	<form method="post" enctype="multipart/form-data">
	<div class="container_cad">	
		<label class="w100">Categoria:</label>
		<select class="w100" name="categoria_id">
			
			<?php 
					
			?>

			<option>Geral</option>
					
				
			
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
	 	<label>Imagem:</label>
	 	<input class="w100" type="file" name="imagem">
	 </div><!--container_cad-->


	 <div class="container_cad">
	 	
	 	<input class="w100" type="submit" name="acao" value="Cadastrar Notícia">
	 </div><!--container_cad-->

	 </form>


	 <?php 

	 	if(isset($_POST["acao"])){
	 		$categoria_id = $_POST['categoria_id'];
	 		$titulo = $_POST["titulo"];
	 		$conteudo = $_POST["conteudo"];
	 		$imagem = $_FILES["imagem"];

	 		if($conteudo == "" || $titulo == ""){
	 			echo "Erro, todos os campos não foram preenchidos!";
	 		}else if($imagem["tmp_name"] == ""){
	 			echo "Erro, o arquivo não foi selecionado.";
	 		}else{

	 			if(Painel::imagemValida($imagem))


	 		}
	 	}

	 ?>


</div><!--cadastrar_not-->