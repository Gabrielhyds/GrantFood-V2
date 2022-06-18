<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
	$sql = "DELETE FROM produtos WHERE id=$id";
	if ($connection->query($sql) === TRUE) {
		$_SESSION['msg'] = '<div class="alert alert-success alert-has-icon alert-dismissible show fade">
		<div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
		<div class="alert-body">
		  <button class="close" data-dismiss="alert">
			<span>&times;</span>
		  </button>
		  <div class="alert-title">Parabéns</div>
			<b>Item</b> excluido com sucesso!
		</div>
	  </div>';
		header("Location:../../view/Funcionario/ListarCad.php");
	} else {
		$_SESSION['msg'] = '<div class="alert alert-dark alert-has-icon alert-dismissible show fade">
		<div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
		<div class="alert-body">
		  <button class="close" data-dismiss="alert">
			<span>&times;</span>
		  </button>
		  <div class="alert-title">Atenção</div>
			Não foi possivel <b>Excluir</b> o Item
		</div>
	  </div>';
		header("Location:../../view/Funcionario/ListarCad.php");
	}
}
else{	
	$_SESSION['msg'] = '<div class="alert alert-dark alert-has-icon alert-dismissible show fade">
	<div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
	<div class="alert-body">
	  <button class="close" data-dismiss="alert">
		<span>&times;</span>
	  </button>
	  <div class="alert-title">Atenção</div>
		Não foi possivel <b>Excluir</b> o Item
	</div>
  </div>';
	header("Location:../../view/Funcionario/ListarCad.php");
}
