<?php
	//Classe abstrata somente para ser herdada
	abstract class People {
		private $id;
		private $name;
		private $mail;
		private $phone;
		private $picture;
		private static $fields = array('id','name','mail','phone','picture');
		//constructor
		function __construct($name, $mail, $phone, $picture, $id = null){
			$this->name = $name;
			$this->mail = $mail;
			$this->phone = $phone;
			$this->picture = $picture;
			$this->id = $id;
		}
		//Métodos getters e setters
		public function getId(){
			return $this->id;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function getMail(){
			return $this->mail;
		}

		public function setMail($mail){
			$this->mail = $mail;
		}

		public function getPhone(){
			return $this->phone;
		}

		public function setPhone($phone){
			$this->phone = $phone;
		}

		public function getPicture(){
			return $this->picture;
		}

		public function setPicture($picture){
			$this->picture = $picture;
		}
		//Funcao para fazer upload
		public function upload(){

		}

		public function getData(){
			extract(get_object_vars($this));
			$arrRetuned = array();
			foreach (compact(Self::$fields) as $key => $value) {
				$arrRetuned[':'.$key] = $value;
			}

			return $arrRetuned;
		}
	}
?>