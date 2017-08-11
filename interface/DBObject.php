<?php
	//interface para objetos que são salvos no banco
	interface DBObject{
		public function save();

		public static function find();

		public function delete();
	}
?>