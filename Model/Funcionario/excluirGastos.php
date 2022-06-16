<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
	$sql = "DELETE FROM gastos WHERE id=$id";
	if ($connection->query($sql) === TRUE) {
		header("Location:../../view/Funcionario/listarGastos.php?success=apagado");
	} else {
		header("Location:../../view/Funcionario/listarGastos.php?error=mysql");
	}
}
else{	
	header("Location:../../view/Funcionario/listarGastos.php?error=id");
}
