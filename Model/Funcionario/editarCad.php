<?php
//Iniciar a sessao
session_start();

//Limpar o buffer de saida
ob_start();

//Incluir a conexao com BD
Require_once "../../Banco/Conexao.php"; 


if(isset($_POST['btnAtualizar'])){
    $id = filter_input(INPUT_POST,"id",FILTER_SANITIZE_NUMBER_INT);
    $produto = $_POST['nome'];
    $descricao =$_POST['descricao'];
    $categoria = $_POST['categoria'];
    $foto = $_FILES['imagem'];
    $preco = $_POST['preco'];
    $error = array();
    // Verifica se o arquivo é uma imagem
    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert"><b>Isso não é uma imagem &#128552;</b></div>';
        header("Location:../index.php");
    }
    if (count($error) == 0) {
            // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
            // Gera um nome único para a imagem
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
            // Caminho de onde ficará a imagem
            $caminho_imagem = "../../View/Funcionario/assets/img/food/" . $nome_imagem;
            // Faz o upload da imagem para seu respectivo caminho
            if(move_uploaded_file($foto["tmp_name"], $caminho_imagem)){       
                   
                $sql = "UPDATE produtos SET nome=?, descricao=?,image=?, preco=?, categoria_id=? 
                        WHERE id=?";
                $stmt= $connPDO->prepare($sql);
                $stmt->execute([$produto, $descricao, $nome_imagem, $preco, $categoria, $id]);
            
                //Criar a variavel global para salvar a mensagem de sucesso
                $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Produto Atualizado com sucesso &#128526</div>';
                header("Location:../../View/Funcionario/cardapio.php");
            }else{
                //Criar a variavel global para salvar a mensagem de sucesso
                $_SESSION['msg'] = '<div class="alert alert-danger" role="alert"><b>Erro ao Atualizar o Produto &#128532;</b></div>';
                header("Location:../../View/Funcionario/editarCad.php?id=$id");
            }
    }

}


?>