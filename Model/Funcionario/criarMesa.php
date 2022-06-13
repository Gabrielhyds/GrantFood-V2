<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['criar'])){
	$novaMesa = $_POST['novaMesa'];

    if(!empty($novaMesa)){
        $sql = "INSERT INTO mesa (numero, STATUS, link, qtdUsada) VALUES ('$novaMesa', 1, 'google.com', 0)";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
        	header('Location: ../../View/Funcionario/statusMesa.php?telas=addmesa&success=criada');
        }else{
        	header('Location: ../../View/Funcionario/statusMesa.php?telas=addmesa&erro=jaExiste');
        }

        
    }else{
    	header('Location: ../../View/Funcionario/statusMesa.php?telas=addmesa&erro=erroInput');
    }
}