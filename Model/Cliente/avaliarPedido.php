<?php
session_start();
include_once("../../Banco/Conexao.php");

if(!empty($_POST['estrela'])){
	$estrela = $_POST['estrela'];
	$codMesa = $_SESSION['mesa'];

	print_r($codMesa);

	//Salvar no banco de dados
	$result_avaliacao = "INSERT INTO avaliacao (qtdEstrela, data_hora, codMesa) VALUES ('$estrela', NOW(), '$codMesa')";
	$resultado_avaliacao = mysqli_query($connection, $result_avaliacao);
		
	if(mysqli_insert_id($connection)){
		$_SESSION['msg'] = '<div class="alert alert-success	 sucesso" role="alert">
			Agradecemos o feedback! 
		</div>';
		header("Location: ../../View/Cliente/pedidos.php?success=avaliar");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar a avaliação";
		header("Location: ../../View/Cliente/pedidos.php?success=avaliar");
	}
	
}else{
	$_SESSION['msg'] = '<div class="alert alert-danger	 sucesso" role="alert">
	É necessário selecionar pelo menos uma estrela.
</div>';
	header("Location: ../../View/Cliente/pedidos.php?success=avaliar");
}