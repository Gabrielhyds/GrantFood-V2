<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$sql = "DELETE FROM categoria WHERE id=$id";
	if ($connection->query($sql) === TRUE) {
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Categoria Excluida com sucesso &#128516</div>';
		header("Location:../../views/Funcionario/cardapio.php");
	} else {
		$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Erro ao excluir a Categoria &#128542</div>';
		header("Location:../../views/Funcionario/cardapio.php");
	}
}
else{	
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Erro ao excluir a Categoria &#128542</div>';
	header("Location:../../views/Funcionario/listarCateg.php?".$id);
}

?>