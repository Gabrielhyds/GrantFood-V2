<?php
    //Iniciar a sessao
    session_start();

    //Limpar o buffer de saida
    ob_start();

    //Incluir a conexao com BD
    include_once "../../Banco/Conexao.php"; 
    
    //Receber os dados do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(isset($dados['btnCad'])){
        $query_categoria = "INSERT INTO categoria 
            (nomeCat) VALUES (:nomeCat)";
            $cad_categoria = $connPDO->prepare($query_categoria);
            $cad_categoria->bindParam(':nomeCat', $dados['nome'], PDO::PARAM_STR);
            $cad_categoria->execute();
            $_SESSION['msg'] = '<div class="alert alert-success alert-has-icon alert-dismissible show fade">
                    <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      <div class="alert-title">Parabéns</div>
                        <b>Categoria</b> Cadastrada com sucesso!
                    </div>
                  </div>';
            header("Location:../../View/Funcionario/cardapio.php");
    }
?>