<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['alterar'])){
	$status = $_POST['status'];
    $idPedido = $_POST['pedido'];

    if(!empty($idPedido)){
        $sql = "UPDATE pedido SET status = '$status' WHERE id = '$idPedido'";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
        	header('Location: ../../Views/Funcionario/listarPedidos.php');
        }else{
        	header('Location: ../../Views/Funcionario/istarPedidos.php?status=erro');
        }

        
    }else{
    	header('Location: ../../Views/Funcionario/istarPedidos.php?status=erro');
    }
}