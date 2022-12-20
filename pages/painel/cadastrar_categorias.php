

<div class="container_Cadastrar_Categ">
		
		<form method="post">
			<label>Nome da Categoria:</label>
			<input class="w100" type="text" name="categoria" >
			<input type="submit" name="acao" value="Cadastrar Categoria" required>

			<input class="w100" type="hidden" name="tabela" value="tb_site.categorias">

		</form>


		<?php 

			if(isset($_POST['acao'])){



				if($_POST["categoria"] == ""){
					echo "<br/>Erro, digite a categoria.";
				}else{

					$verificar = Mysql::conectar()->prepare("SELECT * FROM `tb_site.categorias` WHERE nome = ?");

					$verificar->execute(array($_POST["categoria"]));

					if($verificar->rowCount() == 0){




							$slug = Painel::generateSlug($_POST["categoria"]);
							$arr = ["nome" => $_POST["categoria"], "slug" => $slug, "tabela" => "tb_site.categorias" ];
							
			
							$sql = Painel::insert($arr);





							if($sql == true){
								echo "<br/>A categoria foi cadastrada.";
							}else{
								echo "<br/>Aconteceu um erro tente novamente.";
							}

					}else{
						echo "Erro, mesmo nome que outra categoria no banco de dados";
					}

				

				}

			}

		?>

</div>