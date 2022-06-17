<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['apagar'])){
    $idMesa = $_POST['mesa'];

    if(!empty($idMesa)){
        $sql = "DELETE FROM mesa WHERE numero = '$idMesa'";
        $results = mysqli_query($connection, $sql);

        if ($results){
            header('Location: ../../View/Funcionario/statusMesa.php?success=apagada&mesaApagada=' . $idMesa .'');
        }
    }
}

if(isset($_POST['finalizar'])){
	$idMesa = $_POST['mesa'];

    if(!empty($idMesa)){
        $sql = "DELETE FROM pedidoitem WHERE mesa = '$idMesa'"; //nao foi
        $sql2 = "DELETE FROM pedido WHERE mesa = '$idMesa'"; // foi
        $sql3 = "UPDATE mesa SET status = 1 WHERE numero = '$idMesa'"; // foi
        $sql4 = "DELETE FROM sessao WHERE codMesa = '$idMesa'"; //nao foi

        $results1  = mysqli_query($connection, $sql);
        $results2  = mysqli_query($connection, $sql2);
        $results3  = mysqli_query($connection, $sql3);
        $results4  = mysqli_query($connection, $sql4);

        if($results1 && $results2 && $results3 && $results4){
        	header('Location: ../../View/Funcionario/statusMesa.php?status=mesaonline');
        }else{
        	header('Location: ../../View/Funcionario/statusMesa.php?telas=vermesa&idMesa='. $idMesa .'&status=erro');
        }

        
    }else{
    	header('Location: ../../Views/Funcionario/statusMesa.php?telas=vermesa&idMesa='. $idMesa .'&erro=metodo');
    }
}