<?php
	//Classe de conexao com o banco
	include 'config.php';

	class DB{

		private static $PDO = null;
		//Metodo estático para conectar no banco de acordo com os parâmetros
		public static function conn(){
			//Só cria uma conexão
			if(Self::$PDO === null){
				Self::$PDO = new PDO('mysql:host=' . Config::$host . ';dbname=' . Config::$schema, Config::$user, Config::$pass);
				Self::$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			}
			return Self::$PDO;
		}
	}
?>