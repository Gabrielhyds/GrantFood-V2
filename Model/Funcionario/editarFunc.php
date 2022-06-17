<?php
//Iniciar a sessao
session_start();

//inclui a função para validação do CPF
include "cpfFunc.php";

//Limpar o buffer de saida
ob_start();

//Incluir a conexao com BD
Require_once "../../Banco/Conexao.php"; 


if(isset($_POST['btnAtualizar'])){
    $id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_NUMBER_INT);

    $nome = $_POST['nome'];
    $permissao = $_POST['permissao'];
    $senha = md5($_POST['senha']);
    $comparaSenha = md5($_POST['Confirmasenha']);
    $usuario = $_POST['usuario'];
    $genero = $_POST['genero'];
    $cpf = $_POST['cpf'];
    $salario = $_POST['salario'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $foto = $_FILES['imagem'];

    $ddd = $_POST['ddd'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipoTelefone'];

    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];

    $error = array();
    //verifica se o cpf é verdadeiro
    if(!ValidaCpf($_POST['cpf'])){
        $_SESSION['msg'] = ' <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
        <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <div class="alert-title">Atenção</div>
            CPF Inválido
        </div>
      </div>';
        header("Location:../../View/Funcionario/editarFunc.php?id=$id"); 
    }
    // Verifica se o arquivo é uma imagem
    else if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
        $_SESSION['msg'] = ' <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
        <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <div class="alert-title">Atenção</div>
            Isso não é uma <b>Imagem</b>
        </div>
      </div>';
        header("Location:../../View/Funcionario/editarFunc.php?id=$id");
    }
    //compara as senhas
    else if($senha != $comparaSenha){
        $_SESSION['msg'] = ' <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
        <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          <div class="alert-title">Atenção</div>
            As <b>Senhas</b> não se correspondem
        </div>
      </div>';
        header("Location:../../View/Funcionario/editarFunc.php?id=$id");
    }
    // sem erro executa a inserção no banco
    else if (count($error) == 0) {
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            // Caminho de onde ficará a imagem
            $caminho_imagem = "../../View/Funcionario/assets/img/FotoPerfil/" . $nome_imagem;
            // Faz o upload da imagem para seu respectivo caminho
            if(move_uploaded_file($foto["tmp_name"], $caminho_imagem)){       
                   
                $sql = "UPDATE usuario SET nome=?, tipo=?, senha=?, usuario=?, genero=?, cpf=?, 
                        salario=?, cargaHoraria=?, dica=?, foto=?  WHERE idFunc=?";
                $stmt= $connPDO->prepare($sql);
                $stmt->execute([$nome, $permissao, $senha, $usuario, $genero, $cpf, $salario, $cargaHoraria, $dica, $nome_imagem, $id]);
                

                $sql = "UPDATE endereco SET cep=?, logradouro=?, bairro=?, cidade=?, estado=?, complemento=?, 
                        numero=?  WHERE codEndereco=?";
                $stmt= $connPDO->prepare($sql);
                $stmt->execute([$cep, $logradouro, $bairro, $cidade, $estado, $complemento, $id]);
                
                $sql = "UPDATE telefone SET ddd=?, telefone=?, tipo=? 
                        WHERE codTelefone=?";
                $stmt= $connPDO->prepare($sql);
                $stmt->execute([$ddd, $telefone, $tipo, $id]);
                
                //Criar a variavel global para salvar a mensagem de sucesso
                $_SESSION['msg'] = '<div class="alert alert-success alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  <div class="alert-title">Parabéns</div>
                    <b>Funcionário</b> atualizado com sucesso!
                </div>
              </div>';
                header("Location:../../View/Funcionario/cadastrarFunc.php");
            }else{
                //Criar a variavel global para salvar a mensagem de sucesso
                $_SESSION['msg'] = '<div class="alert alert-dark alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  <div class="alert-title">Atenção</div>
                    Não foi possivel <b>Atualizar</b> o Funcionário
                </div>
              </div>';
                header("Location:../../View/Funcionario/editarFunc.php?id=$id");
            }
    }

}


?>