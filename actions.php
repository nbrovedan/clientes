<?php
	include 'class/client.php';
	//Ação salvar
	if($_GET['action'] === 'save'){
		//Faz upload
		$urlPicture = uploadPicture($_FILES);
		//Seta o id do cliente caso esteja editando
		$idClient = $_POST['id'] === '' ? null : $_POST['id']; 
		//Cria um novo cliente
		$client = new Client($_POST['name'], $_POST['mail'], $_POST['phone'], $urlPicture, $idClient);
		//salva o cliente
		$client->save();
		//Encaminha pra página inicial
		header("location:index.php");
	}elseif($_GET['action'] == 'delete'){
		//Busca o cliente pelo id recebido via get, instancia a classe e delete todos
		foreach (Client::find(array('id' => $_GET['id'])) as $value) {
			//Instancia um novo cliente de acordo com os dados retornados do banco
			$client = new Client($value['name'], $value['mail'], $value['phone'], $value['picture'], $value['id']);
			//Deleta o cliente
			$client->delete();	
		}
		//Manda pro inicio
		header("location:index.php");
	}
	
	//Função para fazer upload
	function uploadPicture($file){
		$destino = 'img/' . $file['picture']['name'];
 		$arquivo_tmp = $file['picture']['tmp_name'];
		move_uploaded_file( $arquivo_tmp, $destino);
		return $destino;
	}
?>