<?php
	include 'class/client.php';
	//busca todos os clientes
	$clients = Client::find();
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
          		<a class="navbar-brand" href="#">Clientes</a>
        	</div>
      	</div>
      	<div class="panel panel-default">
		  	<div class="panel-heading"><a href="cadastro.php" class="btn btn-primary">Novo cliente</a></div>
		  	<div class="panel-body" >
		    	<table class="table table-striped">
		  			<thead>
		  				<tr>
		  					<td style="width: 50px">#</td>
		  					<td style="width: 300px">Nome</td>
		  					<td style="width: 300px">E-mail</td>
		  					<td style="width: 150px">Telefone</td>
		  					<td></td>
		  				</tr>
		  			</thead>
		  			<tbody>
<?php		  			
		  				if(empty($clients)){
		  					echo "<tr><td colspan=\"5\" style=\"text-align:center\">Nenhum cliente cadastrado!</td></tr>";
		  				}else{
		  					foreach ($clients as $value) {
		  						echo '<tr>';
			  					echo "	<td>".$value["id"]."</td>";
			  					echo "	<td>".$value["name"];
			  					echo "		<div class=\"col-xs-6 col-md-3\">";
    							echo "				<a href=\"#\" class=\"thumbnail\">";
      							echo "					<img src=\"" . $value['picture'] . "\" >";
    							echo "				</a>";
  								echo "		</div></td>";
			  					echo "	<td>".$value["mail"]."</td>";
			  					echo "	<td>".$value["phone"]."</td>";
			  					echo "	<td style=\"text-align: right;\"><a href=\"cadastro.php?id=" . $value['id'] . "\" class=\"btn btn-sm btn-warning\">Editar</a>";
			  					echo "								   <a href=\"actions.php?action=delete&id=" . $value["id"] . "\" class=\"btn btn-sm btn-danger\" id=\"delete\">Excluir</a></td>";
			  					echo "</tr>";
			  				}
		  				}
?>		  				
		  			</tbody>
				</table>	
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
			$("#delete").click(function(){
    			if (!confirm("Deseja realmente deletar esse cliente?")){
      				return false;
    			}
  			});
		});
	</script>
</body>
</html>