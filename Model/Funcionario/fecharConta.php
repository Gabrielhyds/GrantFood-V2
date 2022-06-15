<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['finalizar'])){
	$idPedido = $_POST['idPedido'];
	$idMesa = $_POST['mesa'];
    $metodo =    $_POST['metodo'];

    if(!empty($idPedido)){
    	$sql = "INSERT INTO fechaconta (codPedido, formaPagamento, data) VALUES ('$idPedido', '$metodo', NOW())";
        $results1  = mysqli_query($connection, $sql);

        $sql2 = "UPDATE pedido SET status = 'Finalizado' WHERE id = '$idPedido'";
        $results2  = mysqli_query($connection, $sql2);

        if($results1 && $results2){
        	header('Location: ../../View/Funcionario/statusMesa.php?telas=pagarindi&idMesa='. $idMesa .'&idPedido=' . $idPedido .'&status=pago');
        }else{
        	header('Location: ../../View/Funcionario/statusMesa.php?telas=pagarindi&idMesa='. $idMesa .'&idPedido=' . $idPedido .'&status=erro');
        }

        
    }else{
    	header('Location: .../../View/Funcionario/statusMesa.php?telas=pagarindi&idMesa='. $idMesa .'&idPedido=' . $idPedido .'&erro=metodo');
    }
}

if(isset($_POST['geral'])){
    $idMesa = $_POST['mesa'];
    $metodo =    $_POST['metodo'];
    
    if(empty($metodo) && $metodo == 0){
        header('Location: ../../View/Funcionario/statusMesa.php?telas=pagartudo&idMesa='. $idMesa .'&status=vazio');
    }  else {
        foreach($_SESSION["ids"] as $keys => $values){
                $pedido_id = $values["pedido_id"];

               $sql2 = "INSERT INTO fechaConta (codPedido, formaPagamento, data) VALUES ('$pedido_id', '$metodo', NOW())";    
               $results2 = mysqli_query($connection, $sql2); 

                $sql3 = "UPDATE pedido SET status = 'Finalizado' WHERE id = '$pedido_id'";
                $results3  = mysqli_query($connection, $sql3);

               if($results2 && $results3){
                unset($_SESSION["ids"]);
                header('Location: ../../View/Funcionario/statusMesa.php?telas=pagartudo&idMesa='. $idMesa .'&status=pago');
               }    
        }
    }
}