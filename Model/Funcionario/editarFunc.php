<?php
//Iniciar a sessao
session_start();

//Limpar o buffer de saida
ob_start();

//Incluir a conexao com BD
Require_once "../../Banco/Conexao.php"; 


if(isset($_POST['btnAtualizar'])){
    $id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_NUMBER_INT);

    $nome = $_POST['nome'];
    $permissao = $_POST['permissao'];
    $senha = MD5($_POST['senha']);
    $comparaSenha = $_POST['Confirmasenha'];
    $usuario = $_POST['usuario'];
    $genero = $_POST['genero'];
    $cpf = $_POST['cpf'];
    $salario = $_POST['salario'];
    $cargaHoraria = $_POST['cargaHoraria'];
    $dica = $_POST['dica'];
    $foto = $_FILES['imagem'];

    $ddd = $_POST['ddd'];
    $telefone = $_POST['telefone'];
    $tipo = $_POST['tipo'];

    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];

    $error = array();
    // Verifica se o arquivo é uma imagem
    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert"><b>Isso não é uma imagem &#128552;</b></div>';
        header("Location:../index.php");
    } 
    if($senha != $comparaSenha){
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert"><b>Senhas diferentes &#128552;</b></div>';
        header("Location:../index.php");
    }
    if (count($error) == 0) {
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            // Caminho de onde ficará a imagem
            $caminho_imagem = "../../Views/Funcionario/assets/images/FotoPerfil/" . $nome_imagem;
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
                $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Funcionário Atualizado com sucesso &#128526</div>';
                header("Location:../../Views/Funcionario/cadastrarFunc.php");
            }else{
                //Criar a variavel global para salvar a mensagem de sucesso
                $_SESSION['msg'] = '<div class="alert alert-danger" role="alert"><b>Erro ao Atualizado o Funcionário &#128532;</b></div>';
                header("Location:../../Views/Funcionario/editarFunc.php?id=$id");
            }
    }

}


?>