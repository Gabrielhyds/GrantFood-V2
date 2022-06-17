<?php
include('../../Banco/Conexao.php');
session_start();

  if(isset($_POST['btnOn'])){
      $atualizarSistema = "UPDATE sistema SET status = 'On'";
      $resultSistema = mysqli_query($connection, $atualizarSistema);

      if($resultSistema){
        header('Location: ../../View/Funcionario/statusMesa.php?sistema=on');
      }else{
        header('Location: ../../View/Funcionario/statusMesa.php?sistema=erroOn');
      }
  }

  if(isset($_POST['btnOff'])){
    $atualizarSistema = "UPDATE sistema SET status = 'Off'";
    $resultSistema = mysqli_query($connection, $atualizarSistema);

   if($resultSistema){
      header('Location: ../../View/Funcionario/statusMesa.php?sistema=off');
    }else{
      header('Location: ../../View/Funcionario/statusMesa.php?sistema=erroOff');
    }
}
?>