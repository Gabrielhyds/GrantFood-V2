<?php
  include('../../../Banco/Conexao.php');
session_start();
// Report all PHP errors
error_reporting(E_ALL);
            
if(isset($_POST['submit2'])){

         $mesa =  $_POST['mesa'];
         $status = 2;
         date_default_timezone_set('America/Sao_Paulo');
         $hoje = date("YmdHis");
         $chave = '' . $hoje .'&'. $mesa .'';

        if(!empty($mesa)){
                    $_SESSION['chave'] = $chave;
                    $sql1 = "UPDATE mesa SET status = $status WHERE numero = $mesa";
                    $results = mysqli_query($connection, $sql1);
                    //sessao para pegar o id nos pedidos
                    $sql2 = "INSERT INTO sessao (codMesa, codSessao, dataHora) VALUES ('$mesa', '$chave', NOW())";
                    $results2 = mysqli_query($connection, $sql2);

                    $_SESSION['mesa'] = $mesa;
                    $_SESSION['chave'] = $chave;
                    header('Location: ../Cardapio.php');
                    
                 }else{
                    header('Location: index.php?error=Campos');
            exit;
                 }
            }
          


?>