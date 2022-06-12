<?php
include('../../Banco/Conexao.php');
session_start();

if(isset($_POST['remover'])){
	$removerMesa = $_POST['removerMesa'];

    if(!empty($removerMesa)){

        $sql = "SELECT * FROM mesa WHERE numero = '$removerMesa'";
        $results = mysqli_query($connection, $sql);

        if ($results){
            if(mysqli_num_rows($results)>0){
                $sql2 = "DELETE FROM mesa WHERE numero = '$removerMesa'";
                $results2  = mysqli_query($connection, $sql2);
                
                if($results2){
                    header('Location: ../../Views/Funcionario/statusMesa.php?telas=removemesa&success=apagada');
                }else{
                    header('Location: ../../Views/Funcionario/statusMesa.php?telas=removemesa&erro=erroApagar');
                }
            }else{
                header('Location: ../../Views/Funcionario/statusMesa.php?telas=removemesa&erro=naoExiste');
            }
            
        }
    }else{
    	header('Location: ../../Views/Funcionario/statusMesa.php?telas=removemesa&erro=erroInput');
    }
}