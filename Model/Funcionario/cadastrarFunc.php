<?php
//Iniciar a sessao
session_start();

//incluindo a funcão para verficar se o CPF é verdadeiro
include "cpfFunc.php";

//Limpar o buffer de saida
ob_start();

//Incluir a conexao com BD
include_once "../../Banco/Conexao.php"; 

//Receber os dados do formulario
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//var_dump($dados);
    
    if(isset($dados['btnCadastrar'])){
        $foto = $_FILES['imagem'];
        $comparaSenha = md5($dados['Confirmasenha']);
        $senha = md5($dados['senha']);
        $error = array();
        $cpf = $dados['cpf'];
        //verifica se o cpf é verdadeiro
        if(!ValidaCpf($cpf)){
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
            header("Location:../../View/Funcionario/cadastrarFunc.php"); 
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
            header("Location:../../View/Funcionario/cadastrarFunc.php");
        }
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
            header("Location:../../View/Funcionario/cadastrarFunc.php");  
        }
        else if (count($error) == 0) {
                // Pega extensão da imagem
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
                // Gera um nome único para a imagem
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                // Caminho de onde ficará a imagem
                $caminho_imagem = "../../View/Funcionario/assets/img/FotoPerfil/" . $nome_imagem;
                // Faz o upload da imagem para seu respectivo caminho
                if(move_uploaded_file($foto["tmp_name"], $caminho_imagem)){
                    $query_usuario = "INSERT INTO usuario 
                    (nome,tipo,senha,usuario,genero,cpf,salario,cargaHoraria,foto) VALUES
                    (:nome , :tipo, :senha ,:usuario, :genero , :cpf, :salario, :cargaHoraria,:foto)";
                    $cad_usuario = $connPDO->prepare($query_usuario);
                    $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':tipo', $dados['permissao'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':senha',$senha, PDO::PARAM_STR);
                    $cad_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':genero', $dados['genero'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':cpf', $dados['cpf'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':salario', $dados['salario'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':cargaHoraria', $dados['cargaHoraria'], PDO::PARAM_STR);
                    $cad_usuario->bindParam(':foto', $nome_imagem, PDO::PARAM_STR);
                    $cad_usuario->execute();
                    //var_dump($conn->lastInsertId());
                    //Recuperar o ultimo id inserido
                    $id_usuario = $connPDO->lastInsertId();
        
                    $query_endereco= "INSERT INTO endereco 
                                (cep,logradouro,bairro,cidade,estado,complemento,codEndereco,numero) VALUES 
                                (:cep, :logradouro, :bairro, :cidade,:estado,:complemento,:id_usuario,:numero)";
                    $cad_endereco = $connPDO->prepare($query_endereco);
                    $cad_endereco->bindParam(':cep', $dados['cep'], PDO::PARAM_STR);
                    $cad_endereco->bindParam(':logradouro', $dados['logradouro'], PDO::PARAM_STR);
                    $cad_endereco->bindParam(':bairro', $dados['bairro'], PDO::PARAM_STR);
                    $cad_endereco->bindParam(':cidade', $dados['cidade'], PDO::PARAM_STR);
                    $cad_endereco->bindParam(':estado', $dados['estado'], PDO::PARAM_STR);
                    $cad_endereco->bindParam(':complemento', $dados['complemento'], PDO::PARAM_STR);
                    $cad_endereco->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $cad_endereco->bindParam(':numero', $dados['numero'], PDO::PARAM_INT);
                    $cad_endereco->execute();
        
                    $query_telefone = "INSERT INTO telefone
                                    (ddd,telefone,tipo,codTelefone) VALUES
                                    (:ddd,:telefone,:tipo,:id_usuario)";
                    $cad_telefone = $connPDO->prepare($query_telefone);
                    $cad_telefone->bindParam(':ddd', $dados['ddd'], PDO::PARAM_STR);
                    $cad_telefone->bindParam(':telefone', $dados['telefone'], PDO::PARAM_STR);
                    $cad_telefone->bindParam(':tipo', $dados['tipoTelefone'], PDO::PARAM_STR);
                    $cad_telefone->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                    $cad_telefone->execute();
        
                    //Criar a variavel global para salvar a mensagem de sucesso
                    $_SESSION['msg'] = '<div class="alert alert-success alert-has-icon alert-dismissible show fade">
                    <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      <div class="alert-title">Parabéns</div>
                        <b>Funcionário</b> Cadastrado com sucesso!
                    </div>
                  </div>';
                    header("Location:../../View/Funcionario/cadastrarFunc.php");
                }
            }else{
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
                header("Location:../../View/Funcionario/cadastrarFunc.php");
            }
        }
?>