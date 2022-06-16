<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

//verifica se a sessão usuario existe  
require_once('includes/sessao.php');

//inclui a foto do usuário
include_once "includes/foto.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// query select que retorna todos os dados do usuario onde o idfunc for igual a $id
$result_usuario = "SELECT * FROM usuario WHERE idFunc = '$id'";
$resultado_usuario = mysqli_query($connection, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

// query select que retorna todos os dados referente o endereco do usuario onde o codEndereco for igual a $id
$result_endereco = "SELECT * FROM endereco WHERE codEndereco = '$id'";
$resultado_endereco = mysqli_query($connection, $result_endereco);
$row_endereco = mysqli_fetch_assoc($resultado_endereco);

// query select que retorna todos os dados referente o telefone do usuario onde o codTelefone for igual a $id
$result_telefone = "SELECT * FROM telefone WHERE codTelefone = '$id'";
$resultado_telefone = mysqli_query($connection, $result_telefone);
$row_telefone = mysqli_fetch_assoc($resultado_telefone);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>Cadastrar Funcionario</title>


  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="assets/css/demo.css">
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
      * label{
          color:black;
      }
      fieldset.scheduler-border {
        border: 1px black #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
      }

      legend.scheduler-border {
          font-size: 25px !important;
          font-weight: bold !important;
          text-align: left !important;
          color: white;
      }
  </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="ion ion-navicon-round"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
                            <i class="ion ion-android-person d-lg-none"></i>
                            <div class="d-sm-none d-lg-inline-block">olá, <?php echo $_SESSION['usuario']?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profile.html" class="dropdown-item has-icon">
                                <i class="ion ion-android-person"></i> Perfil
                            </a>
                            <a href="../../Controller/Funcionario/sair.php" class="dropdown-item has-icon">
                                <i class="ion ion-log-out"></i> Sair
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">Grant-Food</a>
                    </div>
                    <div class="sidebar-user">
                        <div class="sidebar-user-picture">
                        <?php
                            if (!is_null($foto)){ ?>
                            <img  class="img d-flex align-items-center justify-content-center" src="assets/img/FotoPerfil/<?php echo $foto ?>" alt="" style="width:75px;height: 75px;">
                            <?php }else{ ?>
                                <img  class="img d-flex align-items-center justify-content-center" src="assets/img/example-image.jpeg" alt="" style="width:105px;height: 75px;">
                            <?php }?>
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name"><?php echo $_SESSION['usuario'];?></div>
                            <div class="user-role">
                                Gerente
                            </div>
                        </div>
                    </div>
                    <ul class="sidebar-menu">

                        <li class="menu-header">Opções</li>
                        <li>
                            <a href="statusMesa.php"><i class="ion ion-clipboard"></i><span>Status da Mesa</span></a>
                        </li>
                        <li class="active">
                            <a href="#" class="has-dropdown"><i class="ion ion-ios-people"></i><span>Funcionários</span></a>
                            <ul class="menu-dropdown">
                                <li><a href="CadastrarFunc.php"><i class="ion ion-person-add"></i>Cadastrar Funcionário</a></li>
                                <li class="active"><a href="listarFunc.php"><i class="ion ion-ios-eye"></i>Consultar Funcionário</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-dropdown"><i class="ion ion-ios-cart"></i><span>Cardápio</span></a>
                            <ul class="menu-dropdown">
                                <li><a href="cardapio.php"><i class="ion ion-pizza"></i>Cadastrar Produto</a></li>
                                <li><a href="listarCad.php"><i class="ion ion-ios-eye"></i>Consultar Produto</a></li>
                                <li><a href="listarCateg.php"><i class="ion ion-ios-eye"></i>Consultar Categoria</a></li>
                            </ul>
                        </li>
                        <li >
                            <a href="inserir.php"><i class="ion ion-medkit"></i><span>Inserir</span></a>
                        </li>
                        <li >
                            <a href="relatorioVendas.php"><i class="ion ion-clipboard"></i><span>Relatorio de vendas</span></a>
                        </li>
                </aside>
            </div>
            <div class="main-content">
                <section class="section">
                    <h1 class="section-header">
                        <div>Editar Funcionário</div>
                    </h1>
                    <form method="POST" action="../../Model/Funcionario/editarFunc.php" enctype="multipart/form-data">
            <div>
              <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
              ?>
            </div>
            <div class="row">
            
              </div>
              <input type="hidden" name="id" value="<?php echo $row_usuario['idFunc']; ?>">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Nome completo</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome Completo" value="<?php echo $row_usuario['nome'];?>" required>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4">Usuário</label>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário" value="<?php echo $row_usuario['usuario'];?>" required>
              </div>
              <div class="form-group col-md-4">
              <label for="inputAddress">CPF</label>
              <input type="number" class="form-control" name="cpf" id="cpf" placeholder="XXX.XXX.XXX-XX" value="<?php echo $row_usuario['cpf'];?>" required>
            </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputAddress2">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required >
              </div>
              <div class="form-group col-md-6">
                <label for="inputAddress2">Confirma Senha</label>
                <input type="password" class="form-control" name="Confirmasenha" id="Confirmasenha"  placeholder="Confirme a senha" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="dica">Foto de perfil</label>
                <input type="file" class="form-control" name="imagem" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03"   aria-label="Upload">
              </div>

              <div class="form-group col-md-6">
              <label for="genero">Genêro</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="genero" id="genero" <?php echo $row_usuario['genero'] == "Feminino" ? "checked" : "";?> required value="Feminino">
                <label class="form-check-label" for="Feminino" style="color:black">
                  Feminino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="genero" id="genero" <?php echo $row_usuario['genero'] == "Masculino" ? "checked" : "";?> required value="Masculino">
                <label class="form-check-label" for="Masculino" style="color:black">
                  Masculino
                </label>
              </div>
              </div>
              
            </div>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="ddd">DDD</label>
                <input type="number" class="form-control" name="ddd" id="ddd" value="<?php echo $row_telefone['ddd'];?>" placeholder="ddd" min="1" required>
              </div>
              <div class="form-group col-md-5">
                <label for="telefone">telefone</label>
                <input type="number" class="form-control" name="telefone" id="telefone" value="<?php echo $row_telefone['telefone'];?>" placeholder="telefone" min="1" required>
              </div>
              <div class="form-group col-md-5">
                <label for="telefone">Tipo do telefone</label>
                <select name="tipoTelefone" id="" class="form-control" required>
                  <option value="0" desabled selected>Selecione</option>
                  <option value="Comercial" >Comercial</option>
                  <option value="Residêncial" >Residencial</option>
                </select>
              </div>
            </div>
            <br><br>
            <fieldset>
                <div class="row">
                <div class="form-group col-md-3">
                  <h2>Endereço</h2><hr>
              </div>
                </div>
                <div class="row">
                  <div class="col-4 alert alert-danger d-none" role="alert">
                    <span></span>
                  </div>                
                </div>
                <div class="row">
                  <div class="col-2 mb-3">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" value="<?php echo $row_endereco['cep'];?>" placeholder="CEP" required>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" id="logradouro" value="<?php echo $row_endereco['logradouro'];?>" placeholder="Rua" required>
                  </div>
                  <div class="col-2 mb-3">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero" value="<?php echo $row_endereco['numero'];?>" placeholder="número" required>
                  </div>
                  <div class="col-6 mb-3">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $row_endereco['complemento'];?>" placeholder="Andar,bloco,nº">
                  </div>
                  <div class="col-6 mb-3">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $row_endereco['bairro'];?>" placeholder="ex. jardim das pedras" required>
                  </div>
                  <div class="col-8 mb-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $row_endereco['cidade'];?>" placeholder="ex. sumaré" required>
                  </div>
                  <div class="col-4 mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-control" name="estado" id="estado" value="<?php echo $row_endereco['estado'];?>" required>
                      <option value="">Selecione</option>
                      <option value="AC">Acre</option>
                      <option value="AL">Alagoas</option>
                      <option value="AP">Amapá</option>
                      <option value="AM">Amazonas</option>
                      <option value="BA">Bahia</option>
                      <option value="CE">Ceará</option>
                      <option value="DF">Distrito Federal</option>
                      <option value="ES">Espirito Santo</option>
                      <option value="GO">Goiás</option>
                      <option value="MA">Maranhão</option>
                      <option value="MS">Mato Grosso do Sul</option>
                      <option value="MT">Mato Grosso</option>
                      <option value="MG">Minas Gerais</option>
                      <option value="PA">Pará</option>
                      <option value="PB">Paraíba</option>
                      <option value="PR">Paraná</option>
                      <option value="PE">Pernambuco</option>
                      <option value="PI">Piauí</option>
                      <option value="RJ">Rio de Janeiro</option>
                      <option value="RN">Rio Grande do Norte</option>
                      <option value="RS">Rio Grande do Sul</option>
                      <option value="RO">Rondônia</option>
                      <option value="RR">Roraima</option>
                      <option value="SC">Santa Catarina</option>
                      <option value="SP">São Paulo</option>
                      <option value="SE">Sergipe</option>
                      <option value="TO">Tocantins</option>
                    </select>                  
                  </div>
                </div>
              </fieldset>
              <br><br>

              <fieldset>
                <div class="row">
                <div class="form-group col-md-5">
                  <h2>Dados da Empresa</h2><hr>
                </div>
                </div>
                <div class="row">
                  <div class="col mb-5">
                    <label for="permissao" class="form-label" >Permissão</label>
                    <select name="permissao" class="form-control" required>
                      <option value="0" disabled selected>Selecione</option>
                      <option value="1">Gerente</option>
                      <option value="2">Garçom</option>
                      <option value="3">Cozinha</option>
                    </select>
                  </div>
                  <div class="col mb-5">
                    <label for="salario" class="form-label">salario</label>
                    <input type="number" class="form-control" name="salario" value="<?php echo $row_usuario['salario'];?>" id="salario" min="1" required>
                  </div>
                  <div class="col mb-5">
                    <label for="cargaHoraria" class="form-label">carga Horaria</label>
                    <input type="number" class="form-control" name="cargaHoraria" id="cargaHoraria" value="<?php echo $row_usuario['cargaHoraria'];?>" min="1" required>
                  </div>
                </div>
                <div >
                  <button type="submit" class="btn btn-success" name="btnAtualizar">Atualizar</button>
                </div>
              </fieldset>
            </form>
          </div>  
            </div>

                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left" style="color:black;">
                    COPYRIGHT &copy; 2022
                    <div class="bullet"></div> Todos os direitos reservados a Gran-Food <div class="bullet"></div> Versão 2.0</a>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    


    <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="assets/js/sa-functions.js"></script>
  
  <script src="http://maps.google.com/maps/api/js?key=YOUR_API_KEY&amp;sensor=true"></script>
  <script src="assets/modules/gmaps.js"></script>
  <script>
    // init map
    var simple_map = new GMaps({
      div: '#simple-map',
      lat: -6.5637928,
      lng: 106.7535061
    })
  </script>
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/demo.js"></script>
  <script src="assets/js/cepFunc.js"></script>
</body>

</html>