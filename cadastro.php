<?php
	include 'class/client.php';
	//Verifica se é edição, busca o cliente pelo id senão cria um array zerado
	if(isset($_GET['id'])){
		$client = Client::find(array('id' => $_GET['id']))[0];
	}else{
		$client = array('name' => '', 'phone' => '', 'picture' => '', 'mail' => '', 'id' => null);
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de clientes</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
     	<div class="navbar navbar-default" role="navigation">
        	<div class="navbar-header">
          		<a class="navbar-brand" href="index.php">Clientes</a>
        	</div>
      	</div>
      	<div class="help-block with-errors"></div>
      	<div class="row">
      		<div class="col-sm-6">
		      	<div class="panel panel-default">
				  	<div class="panel-heading">Inserindo novo cliente</div>
				  	<div class="panel-body" >
				    	<form role="form" action="actions.php?action=save" method="post" enctype="multipart/form-data" data-toggle="validator">
						  	<div class="form-group">
						    	<label for="name">Nome</label>
						    	<input type="hidden" name="id" id="id" value="<?=$client['id']?>">
						    	<input type="text" name="name" class="form-control" id="name" placeholder="Nome" value="<?=$client['name']?>" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="name">E-mail</label>
						    	<input type="email" name="mail" class="form-control" id="mail" placeholder="E-mail" value="<?=$client['mail']?>" data-error="Por favor, informe um e-mail correto." required>
						  	</div>
						  	<div class="form-group">
						    	<label for="phone">Telefone</label>
						    	<input type="text" name="phone" class="form-control" id="phone" placeholder="Telefone" value="<?=$client['phone']?>" required>
						  	</div>
						  	<div class="form-group">
						    	<label for="picture">Foto</label>
						    	<input type="file" id="picture" name="picture" required>
						  	</div>
						  	<button type="submit" class="btn btn-primary">Cadastrar</button>
						</form>
				  	</div>
				</div>
			</div>
			<div class="col-sm-4">
				<img src="<?=$client['picture']?>">
			</div>
		</div>
    </div>
    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
	<script>
		$(document).ready(function(){
		  $('#phone').mask('(00) 00000-0000');
		});
	</script>
</body>
</html>