<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['cancelar'])){
    $numero =    $_POST['numero'];

    if(!empty($numero)){
        $sql1 = "DELETE FROM pedidoitem WHERE codPedido = '$numero'";
        $results1  = mysqli_query($connection, $sql1);

        $sql2 = "DELETE FROM pedido WHERE id = '$numero'";
        $results2 = mysqli_query($connection, $sql2);


        header('Location: ../../View/Cliente/pedidos.php?success=pedidoApagado');
    }
}