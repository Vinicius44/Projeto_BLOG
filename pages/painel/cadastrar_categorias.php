

<div class="container_Cadastrar_Categ">
		
		<form method="post">
			<label>Nome da Categoria:</label>
			<input class="w100" type="text" name="cadastrar_cat" >
			<input type="submit" name="acao" value="Cadastrar Categoria" required>

			<input class="w100" type="hidden" name="tabela" value="tb_site.categorias">

		</form>


		<?php 

			if(isset($_POST['acao'])){


				$sql = Painel::insert($_POST);

				if($sql == true){
					echo "A categoria foi cadastrada";
				}

			}

		?>

</div>