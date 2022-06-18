<?php
    
 //Iniciar a sessao
 session_start();

 //Limpar o buffer de saida
 ob_start();

 //Incluir a conexao com BD
 Require_once "../../Banco/Conexao.php"; 
 
 //Receber os dados do formulario
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($dados);

if(isset($dados['btnCadastrar'])){
    $categoria = $_POST['categoria'];
    $foto = $_FILES['imagem'];
    $_SESSION['foto'] = $foto;
    $error = array();
    // Verifica se o arquivo é uma imagem
    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
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
        header("Location:../../View/Funcionario/cardapio.php");
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
                //query_
                $query_produto = "INSERT INTO produtos 
                (nome,descricao,image,preco,categoria_id) VALUES
                (:nome , :descricao, :image ,:preco, :categoria_id)";
                $cad_produto = $connPDO->prepare($query_produto);
                $cad_produto->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $cad_produto->bindParam(':descricao', $dados['descricao'], PDO::PARAM_STR);
                $cad_produto->bindParam(':image', $nome_imagem, PDO::PARAM_STR);
                $cad_produto->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
                $cad_produto->bindParam(':categoria_id', $categoria, PDO::PARAM_INT);
                $cad_produto->execute();

               
        
                $_SESSION['msg'] = '<div class="alert alert-success alert-has-icon alert-dismissible show fade">
                    <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      <div class="alert-title">Parabéns</div>
                        <b>Item</b> Cadastrado com sucesso!
                    </div>
                  </div>';
                header("Location:../../View/Funcionario/cardapio.php");
            }else{
                $_SESSION['msg'] = '<div class="alert alert-dark alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  <div class="alert-title">Atenção</div>
                    Não foi possivel <b>Cadastrar</b> o item
                </div>
              </div>';
                header("Location:../../View/Funcionario/cardapio.php");
            }
    }
}



?>

