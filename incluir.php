<?php
//Iniciar  Sessão
session_start();



if(isset($_POST['btn-cadastrar'])):
	//Tranforma caracteres especiais em HTML
	$descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_SPECIAL_CHARS);
	//Tranforma caracteres especiais em HTML
	$data = $_POST['data'];
	$preco = filter_input(INPUT_POST,'preco',FILTER_SANITIZE_STRING);
	//Remove todos caracteres, exceto números sinal de mais e menos.
	//Conexão
	require_once 'banco.php';

	
	$sql="INSERT INTO produto(descricao,dataProduto,preco) VALUES (?, ?, ?)";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param("sss", $descricao, $data, $preco);
	if($stmt->execute()):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		header('Location: consultar.php?sucesso');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		header('Location: consultar.php?erro');
	endif;
endif;	

?>