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
	$_SESSION['msg'] = '<div class="alert alert-success alert-has-icon alert-dismissible show fade">
		<div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
		<div class="alert-body">
		  <button class="close" data-dismiss="alert">
			<span>&times;</span>
		  </button>
		  <div class="alert-title">Parabéns</div>
			<b>Funcionário</b> excluido com sucesso!
		</div>
	  </div>';
    header("Location:../../view/Funcionario/ListarFunc.php");
}
else{	
	$_SESSION['msg'] = '<div class="alert alert-dark alert-has-icon alert-dismissible show fade">
	<div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
	<div class="alert-body">
	  <button class="close" data-dismiss="alert">
		<span>&times;</span>
	  </button>
	  <div class="alert-title">Atenção</div>
		Não foi possivel <b>Excluir</b> o Funcionário
	</div>
  </div>';
	header("Location:../../view/Funcionario/ListarFunc.php");
}
