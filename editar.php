<?php
//Header
$paginaJS = "adicionarprodutos";
include_once 'header.php';
include_once 'navbar.php';

//Select com o id que veio da URL
if(isset($_GET['id'])):
	
	//Conexão
	include_once 'banco.php';
	$id =filter_var($_GET['id'],FILTER_SANITIZE_STRING);
	
	$sql="SELECT * FROM produto WHERE idProduto =  '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
 
 ?>



<div class="row">
<div class="container my-3">
	
		<form action="atualizar.php" method="POST">

		<div class="row mx-3 g-2">
			<h1 class="display-5 mx-3 ">Atualizar Produto</h1>
			<div class="row mx-3 g-2">
			<input type="hidden" name="id" value="<?php echo $dados['idProduto']; ?>">
			<div class="input-field col-2">
				<label for="nome" class="form-label"> Descrição</label>
				<input type="text" name="descricao" id="descricao" class="form-control" value="<?php echo $dados['descricao']; ?>">
			</div>
		
			<div class="input-field col-1">
				<label for="data" class="form-label"> Data</label>
				<input type="date" name="dataProduto" class="form-control" id="dataProduto" value="<?php echo $dados['dataProduto']; ?>">
				
			</div>
		
			<div class="input-field col-1">
				<label for="preco" class="form-label"> Preço</label>
				<input type="text" name="preco" class="form-control" id="preco" value="<?php echo $dados['preco']; ?>" >
				
			</div>
		</div>
			<div class="input-field col-1">
				
			</div>
			
			<div class="row mx-3 my-3 g-2">
				<div class="col-2">
					<button type="submit" name="btn-atualizar"  class="btn btn-primary">Atualizar</button>
					<a href="consultar.php" type="submit" class="btn btn-primary">Lista de Produtos</a>
					
				</div>
			</div>
		</div>
		</form>
		
	</div>
</div>


<?php include_once 'footer.php';?>

     
 
