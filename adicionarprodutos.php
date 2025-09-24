<?php 
	$paginaJS = "adicionarprodutos";
	include_once 'header.php';
	include_once 'navbar.php';
	
?>

<div class="m-5 row">
	<div class="container my-3">               
	 <!--(2) Exemplo de formulario-->
	 <div class="fs-1 mb-5">
            <h1>Adicionar Produtos</h1>
        </div>
	 <form action="incluir.php" method="POST">
		 <div class="row mx-3 g-2">
			 <div class="col-3">
				 <!--(3) adicionar o atributo required ao campo text-->
				 <label for="nome" class="form-label">Descrição</label>
				 <input type="text" class="form-control" id="descricao" name="descricao" required>
			 </div>
			 <div class="col-1">
				 <label for="sobrenome" class="form-label">Data</label>
				 <input type="date" class="form-control" id="data" name="data">
			 </div>
			 <div class="col-2">
				 <label for="preco" class="form-label">Preço</label>
                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input type="text" class="form-control" id="preco" name="preco" placeholder="0,00">
                    </div>
			 </div>
			 
		 </div>
		 <div class="row mx-3 my-3 g-2">
		 	<div class="col-2">
				<button type="submit" name="btn-cadastrar" class="btn btn-primary"> Cadastrar</button>
				<a href="consultar.php" type="submit" name="btn-cadastrar" class="btn btn-primary"> Lista de Produtos</a>
			</div>
		</div>
	 </form>    
 </div>
 </div>
<?php include_once 'footer.php';?>
