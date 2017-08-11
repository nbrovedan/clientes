<?php

	include 'class/people.php';
	include 'interface/DBObject.php';
	include 'DB/DB.php';
	
	class Client extends People implements DBObject{

		//Método que salva (insert ou update) o cliente no banco
		public function save(){
			try{
				if($this->getId() == null){
					$stmt = DB::conn()->prepare('insert into clients (id, name, mail, picture, phone) value (:id, :name, :mail, :picture, :phone)');
				}else{
					$stmt = DB::conn()->prepare('update clients set name = :name, mail = :mail, picture = :picture, phone = :phone where id = :id');
				}
				
				echo '<pre>';
				print_r($this->getData());
				$stmt->execute($this->getData());
				return $stmt->rowCount();	
			}catch(PDOException $e){
				echo 'Falha ao salvar o registro!<BR /><BR />Mensagem original: ' . $e->getMessage();	
			}
		}
		//Método estático para buscar os clientes de acordo com o filtro - retorna um array com os dados do cliente
		public static function find($cond = array()){
			if(empty($cond)){
				$sql = 'SELECT id, name, mail, picture, phone FROM clients';
			}else{
				$sql = 'SELECT id, name, mail, picture, phone FROM clients where ';

				foreach ($cond as $key => $value) {
					$sql .= $key . ' = ' . $value;
				}
			}
			$stmt = DB::conn()->query($sql);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		//Método de delete - compara todos para usar o getData da classe people (Como é um objeto, sempre será tudo igual)
		public function delete(){
			$stmt = DB::conn()->prepare('DELETE FROM clients WHERE id = :id and name = :name and mail = :mail and picture = :picture and phone = :phone');
			$stmt->execute($this->getData());
			return $stmt->rowCount();	
		}
	}
?>