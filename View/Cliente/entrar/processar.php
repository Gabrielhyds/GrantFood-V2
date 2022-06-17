<?php
  include('../../../Banco/Conexao.php');
session_start();
// Report all PHP errors
error_reporting(E_ALL);
            
if(isset($_POST['submit2'])){
          //VERIFICAR SE A MESA EXISTE
         $mesa =  $_POST['mesa'];
         $sqlSessao = "SELECT qtdUsada FROM mesa WHERE numero = '$mesa'";
         $result = mysqli_query($connection, $sqlSessao);

         if(mysqli_num_rows($result) > 0){
           
            //CRIA O NUMERO DA SESSAO
            $status = 2;
            date_default_timezone_set('America/Sao_Paulo');
            $hoje = date("YmdHis");
            $chave = '' . $hoje .'&'. $mesa .'';

            //SE EXISTER ALGUM NUMERO NO POST DA MESA
            if(!empty($mesa)){
                        $_SESSION['chave'] = $chave;

                        // PEGAR A QUANTIADE DE VEZES USADA DA MESA
                        $sqlSessao = "SELECT qtdUsada FROM mesa WHERE numero = '$mesa'";
                        $result = mysqli_query($connection, $sqlSessao);
                        $row = mysqli_fetch_array($result);

                        $qtdUsada = $row['qtdUsada'] + 1;
                        

                        //SUBIR PARA O BANCO A MESA SENDO USADA
                        $sql1 = "UPDATE mesa SET status = $status, qtdUsada = '$qtdUsada' WHERE numero = $mesa";
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
              }else{
                header('Location: index.php?error=mesanaoexiste');
              }
            }
          


?>