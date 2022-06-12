<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['update'])){
    $mesa =    $_SESSION['mesa'];

    if(!empty($mesa)){
        $sql1 = "UPDATE mesa SET status = 3 WHERE numero = '$mesa'";
        $results1  = mysqli_query($connection, $sql1);

        if($results1){
            header('Location: ../../Views/Cliente/pedidos.php?success=fecharConta');
        }else{
            header('Location: ../../Views/Cliente/pedidos.php?error=fecharConta');
        }
    }
}