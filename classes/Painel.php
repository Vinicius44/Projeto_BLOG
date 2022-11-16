<?php


	/**
	 * 
	 */
	class Painel
	{
		
	

		public static function insert($dados){


			$table_name = $_POST["tabela"];
			$query = "INSERT INTO `$table_name` VALUES (null";
			


			foreach ($dados as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($key == "tabela" || $key == "acao_adicionar"){
					continue;
				}
				$query.= ",?";
				$parametros[] = $value;

			}

			$query.= ")";
			
			$sql = Mysql::conectar()->prepare($query);
			$sql->execute($parametros);
			
			return true;
		}



		public static function selectAll($tabela, $start = null, $end = null){
			if($start == null && $end == null){
				$query = "SELECT * FROM $tabela";
				$sql = Mysql::conectar()->prepare($query);
				
			}else{
				$sql = Mysql::conectar()->prepare("SELECT * FROM $tabela LIMIT $start, $end");
			}


			$sql->execute();
			return $sql->fetchAll();
		}

		public static function select($tabela,$idString, $id){
			
			$query = "SELECT * FROM $tabela WHERE ".$idString;
			$sql = Mysql::conectar()->prepare($query);
			$sql->execute($id);

			return $sql->fetch();
		}



		public static function update($dados){

			$tabela = $_POST["tabela"];
			$query = "UPDATE $tabela SET ";  
			$primeiro = true;

			foreach ($dados as $key => $value) {
				if($key == 'tabela' || $key == 'acao_editar' || $key == 'id'){
					continue;
				}


				if($primeiro == true){
						$query.= $key.' = ?';
						$primeiro = false;
				}else{
					$query.= ", ".$key." = ?";
				}
			
				$parametros[] = $value;

			}

			$query.= "WHERE id = ?;";
			$parametros[] = $_POST["id"];


			$sql = Mysql::conectar()->prepare($query);

			
			
			if($sql->execute($parametros)){
				return true;
			}
			//return true;
		
		
		}

		public static function deletar($tabela, $id){
			$query = "DELETE FROM $tabela WHERE id = ?";
			$sql = Mysql::conectar()->prepare($query);
			$sql->execute(array($id));

			return true;
		}
	}



?>