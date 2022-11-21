<?php


	/**
	 * 
	 */
	class Painel
	{
		
		public static function generateSlug($str){
			$str = mb_strtolower($str);
			$str = preg_replace('/(â|á|ã)/', 'a', $str);
			$str = preg_replace('/(ê|é)/', 'e', $str);
			$str = preg_replace('/(í|Í)/', 'i', $str);
			$str = preg_replace('/(ú)/', 'u', $str);
			$str = preg_replace('/(ó|ô|õ|Ô)/', 'o',$str);
			$str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
			$str = preg_replace('/( )/', '-',$str);
			$str = preg_replace('/ç/','c',$str);
			$str = preg_replace('/(-[-]{1,})/','-',$str);
			$str = preg_replace('/(,)/','-',$str);
			$str=strtolower($str);
			return $str;
		}
		

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
				echo "executei";
			}else{
				$sql = Mysql::conectar()->prepare("SELECT * FROM $tabela LIMIT $start, $end");
			}

			echo "executado";


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



		public static function imagemValida($imagem){
			if($imagem["type"] == "image/jpeg" || $imagem["type"] == "image/png" || $imagem["type"] == "image/jpg"){


				$tamanho= intval($imagem["size"] / 1024);

				if($tamanho < 300){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}


	}



?>