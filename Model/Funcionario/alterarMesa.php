<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['alterar'])){
	$status = $_POST['status'];
	$idMesa = $_POST['mesa'];
    $idPedido = $_POST['pedido'];

    if(!empty($idPedido)){
        $sql = "UPDATE pedido SET status = '$status' WHERE id = '$idPedido'";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
        	header('Location: ../../View/Funcionario/statusMesa.php?telas=vermesa&idMesa='. $idMesa .'');
        }else{
        	header('Location: ../../View/Funcionario/statusMesa.php?telas=vermesa&idMesa='. $idMesa .'&status=erro');
        }

        
    }else{
    	header('Location: ../../View/Funcionario/statusMesa.php?telas=vermesa&idMesa='. $idMesa .'&erro=metodo');
    }
}