<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['adicionarConta'])){
	$valor = $_POST['valor'];
	$tipo = $_POST['tipo'];
	$descricao = $_POST['descricao'];

    if(!empty($valor)){

        $sql = "INSERT INTO gastos (valor, tipo, descricao, data) VALUES ('$valor', '$tipo', '$descricao', NOW())";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
            echo "foi";
        	header('Location: ../../View/Funcionario/inserir.php?success=criada&tipo=' . $tipo . '');
        }else{
            echo "nao foi";
        	header('Location: ../../View/Funcionario/inserir.php?erro=sqlContas');
        }

        
    }else{
    	header('Location: ../../View/Funcionario/inserir.php?erro=erroInput');
    }
}

if(isset($_POST['adicionarManutencao'])){
	$valor = $_POST['valor'];
	$tipo = $_POST['tipo'];
	$descricao = $_POST['descricao'];


    if(!empty($valor)){
        $sql = "INSERT INTO gastos (valor, tipo, descricao, data) VALUES ('$valor', '$tipo', '$descricao', NOW())";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
             header('Location: ../../View/Funcionario/inserir.php?success=criada&tipo=' . $tipo .'');
        }else{
        	header('Location: ../../View/Funcionario/inserir.php?erro=sqlManutencao');
        }

        
    }else{
    	header('Location: ../../View/Funcionario/inserir.php?erro=erroInput');
    }
}

if(isset($_POST['adicionarEstoque'])){
	$valor = $_POST['valor'];
	$tipo = $_POST['tipo'];
	$descricao = $_POST['descricao'];
    
    if(!empty($valor)){
        $sql = "INSERT INTO gastos (valor, tipo, descricao, data) VALUES ('$valor', '$tipo', '$descricao', NOW())";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
        	header('Location: ../../View/Funcionario/inserir.php?success=criada&tipo=' . $tipo. '');
        }else{
        	header('Location: ../../View/Funcionario/inserir.php?erro=sqlEstoque');
        }

        
    }else{
    	header('Location: ../../View/Funcionario/inserir.php?erro=erroInput');
    }
}