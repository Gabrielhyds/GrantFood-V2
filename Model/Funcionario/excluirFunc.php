<?php

session_start();
ob_start();
include_once '../../Banco/Conexao.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//var_dump($id);
if(!empty($id)){
	$result_usuario = "DELETE FROM endereco WHERE codEndereco ='$id'";
	$resultado_usuario = mysqli_query($connection, $result_usuario);
	mysqli_affected_rows($connection);
}if(!empty($id)){
	$result_usuario = "DELETE FROM telefone WHERE codTelefone ='$id'";
	$resultado_usuario = mysqli_query($connection, $result_usuario);
	mysqli_affected_rows($connection);
}if(!empty($id)){
	$result_usuario = "DELETE FROM usuario WHERE idFunc ='$id'";
	$resultado_usuario = mysqli_query($connection, $result_usuario);
	mysqli_affected_rows($connection);
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Funcionário Excluido com sucesso &#128516</div>';
    header("Location:../../view/Funcionario/ListarFunc.php");
}
else{	
	$_SESSION['msg'] = '<div class="alert alert-success" role="alert">Erro ao excluir o Funcionário &#128542</div>';
	header("Location:../../view/Funcionario/ListarFunc.php");
}
