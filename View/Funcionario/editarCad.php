<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

//verifica se a sessão usuario existe  
require_once('includes/sessao.php');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// query select que retorna todos os dados do usuario onde o idfunc for igual a $id
$result_produto = "SELECT * FROM produtos WHERE id = $id;";
$resultado_produto = mysqli_query($connection, $result_produto);
$row_produto = mysqli_fetch_assoc($resultado_produto);



//inclui a foto de perfil do usuário
include 'includes/foto.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>GrantFood - Editar produtos</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.jpg">

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
                            if (!is_null(@$foto)){ ?>
                            <img  class="img d-flex align-items-center justify-content-center" src="assets/img/FotoPerfil/<?php echo $foto ?>" alt="" style="width:75px;height: 75px;">
                            <?php }else{ ?>
                                <img  class="img d-flex align-items-center justify-content-center" src="assets/img/FotoPerfil/bg.jpg" alt="" style="width:78px;height: 75px;">
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
                        <li >
                            <a href="#" class="has-dropdown"><i class="ion ion-ios-people"></i><span>Funcionários</span></a>
                            <ul class="menu-dropdown">
                                <li><a href="CadastrarFunc.php"><i class="ion ion-person-add"></i>Cadastrar Funcionário</a></li>
                                <li ><a href="listarFunc.php"><i class="ion ion-ios-eye"></i>Consultar Funcionário</a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#" class="has-dropdown"><i class="ion ion-ios-cart"></i><span>Cardápio</span></a>
                            <ul class="menu-dropdown" >
                                <li><a href="cardapio.php"><i class="ion ion-pizza"></i>Cadastrar itens</a></li>
                                <li class="active"><a href="listarCad.php"><i class="ion ion-ios-eye"></i>Consultar itens</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-dropdown"><i class="ion ion-medkit"></i><span>Inserir</span></a>
                            <ul class="menu-dropdown">
                                <li><a href="inserir.php" class="active"><i class="ion ion-bag"></i>Cadastro de gastos</a></li>
                                <li><a href="listarGastos.php"><i class="ion ion-ios-eye"></i>Consultar gastos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="listarAvaliar.php"><i class="ion ion-star"></i><span>Avaliações</span></a>
                        </li>
                        <li >
                            <a href="relatorioVendas.php"><i class="ion ion-clipboard"></i><span>Relatorio de vendas</span></a>
                        </li>
                        <div class="sidebar-user">
                          <div class="sidebar-user-picture">
                                  <img  class="img d-flex align-items-center justify-content-center" src="assets/img/Logo.png" alt="" style="width:120px;height: 90px;margin-left:50px;margin-top:35px">
                          </div>
                        </div>
                </aside>
            </div>
            <div class="main-content">
                <section class="section">
                    <h1 class="section-header">
                        <div>Editar produto</div>
                    </h1>
                    <div class="container">
            
            <!--MENU-->
            <div style="position: relative; left: 12px">
            <div>
                      <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                      ?>
                    </div>
                    <div class="row mt-12">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Editando item</h4>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Produto</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <!-- CADASTRAR PRODUTOS -->
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                                    
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="../../Model/Funcionario/cadastrarCad.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <input type="hidden" name="id" value="<?php echo $row_produto['id']; ?>">
                                            <div class="form-group col-md-6">
                                                <label for="manutencao">Nome produto</label>
                                                <input type="text" class="form-control" name="nome" value="<?php echo $row_produto['nome'];?>"  >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="utensilios">Descrição</label>
                                                <input type="text" class="form-control" name="descricao" value="<?php echo $row_produto['descricao'];?>" >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="utensilios">Categoria</label>
                                                    <select class="form-control" name="categoria">
                                                        <option value="">Selecione...</option>
                                                        <?php
                                                            $result_categoria = "SELECT prod.id,categ.nomeCat 
                                                            FROM produtos AS prod
                                                            LEFT JOIN categoria AS categ ON prod.categoria_id=categ.id where prod.id = $id;";
                                                            $resultado_categoria = mysqli_query($connection, $result_categoria);
                                                            while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){ ?>
                                                            <option value="<?php echo $row_categoria['id']; ?>" disabled selected><?php echo $row_categoria['nomeCat']; ?></option> <?php
                                                            }
                                                        ?>
                                                        <?php
                                                            $result_categoria = "SELECT * FROM categoria";
                                                            $resultado_categoria = mysqli_query($connection, $result_categoria);
                                                            while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){ ?>
                                                            <option value="<?php echo $row_categoria['id']; ?>"><?php echo $row_categoria['nomeCat']; ?></option> <?php
                                                            }
                                                        ?>
                                                    </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="utensilios">Insira a imagem</label>
                                                <input type="file" class="form-control" name="imagem" placeholder="Descricao..." >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="utensilios">Valor</label>
                                                <input type="number" class="form-control" name="preco" value="<?php echo $row_produto['preco'];?>" >
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="btnCadastrar">Cadastrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        
            </div>
          </div>
          
        </div>
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
    </div>


    <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="assets/js/sa-functions.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
  
  <script src="assets/js/cepFunc.js"></script>
  <script src="assets/js/modal.js"></script>
</body>

</html>