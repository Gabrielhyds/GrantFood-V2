<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['criar'])){
	$novaMesa = $_POST['novaMesa'];
	$lugares = $_POST['lugares'];

    if(!empty($novaMesa) && !empty($lugares)){
        $sql = "INSERT INTO mesa (numero, STATUS, lugares, qtdUsada) VALUES ('$novaMesa', 1, '$lugares', 0)";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
        	header('Location: ../../View/Funcionario/statusMesa.php?success=criada&mesaCriada=' . $novaMesa . '');
        }else{
        	header('Location: ../../View/Funcionario/statusMesa.php?telas=addmesa&erro=jaExiste');
        }

        
    }else{
    	header('Location: ../../View/Funcionario/statusMesa.php?telas=addmesa&erro=erroInput');
    }
}