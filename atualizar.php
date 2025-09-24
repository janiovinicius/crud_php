<?php
if(isset($_POST['btn-atualizar'])):
	$descricao=filter_var($_POST['descricao'],FILTER_SANITIZE_STRING);
	$data=filter_var($_POST['dataProduto'],FILTER_SANITIZE_STRING);
	$preco=filter_var($_POST['preco'], FILTER_SANITIZE_STRING);
	$id=filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
	

	//Conexão
	require_once 'banco.php';

	$sql="UPDATE produto SET descricao='$descricao', dataProduto='$data', preco='$preco' WHERE  idProduto=$id";
	echo $sql;
	if(mysqli_query($connect,$sql)):		
		header('Location: consultar.php?atualiza=ok');
	else:		
		header('Location: consultar.php?atualiza=erro');
	endif;
endif;	

?>