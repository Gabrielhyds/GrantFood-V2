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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>GrantFood - Listar Funcionários</title>
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
                                <li><a href="cardapio.php"><i class="ion ion-pizza"></i>Cadastrar itens</a></li>
                                <li><a href="listarCad.php"><i class="ion ion-ios-eye"></i>Consultar itens</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="has-dropdown"><i class="ion ion-medkit"></i><span>Inserir</span></a>
                            <ul class="menu-dropdown">
                                <li><a href="inserir.php" class="active"><i class="ion ion-bag"></i>Cadastro de gastos</a></li>
                                <li><a href="listarGastos.php"><i class="ion ion-ios-eye"></i>Consultar gastos</a></li>
                            </ul>
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
                        <div>Produtos cadastrados no sistema</div>
                    </h1>
                    <form method="POST">
                    <div>
                        <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                        ?>
                    </div>
              <div>
              <?php $sql = "SELECT * FROM usuario"; $result = $connection->query($sql);?>
              <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                                <h4>Funcionarios Cadastrados no sistema</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Usuário</th>
                                    <th>Salário</th>
                                    <th>Permissão</th>
                                    <th>Ação</th>
                                    </tr>
                                    <?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {?> 
                                    
                                        <tr>
                                            <td><?php echo $row["idFunc"]; ?></td>
                                            <td><?php echo $row["nome"]; ?></td> 
                                            <td><?php echo $row["usuario"]; ?></td>
                                            <td><?php echo $row["salario"]; ?></td>
                                            <?php
                                                switch($row['tipo']){
                                                case 1:
                                                    $tipo = 'Gerente';
                                                    break;
                                                case 2:
                                                    $tipo = "Garçom";
                                                    break;
                                                case 3:
                                                    $tipo = "Cozinha";
                                                    break;
                                                }
                                            ?>
                                            <td><?php echo $tipo;?></td>
                                            <td> 
                                                <button type="button" name="editar" class="btn btn-success" onclick="window.location.href='editarFunc.php?id=<?php echo $row['idFunc']; ?>'">
                                                    <span class="ion-edit"></span>Editar
                                                </button> 
                                                <button type="button" name="excluir" class="btn btn-danger" onclick="window.location.href='../../Model/Funcionario/excluirFunc.php?id=<?php echo $row['idFunc']; ?>'">
                                                    <span class="ion-trash-a"></span> Excluir
                                                </button>
                                            </td> 
                                        </tr>
                                    <?php   
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger" role="alert">
                                                    Nenhum produto cadastrado! &#128552 
                                                    </div>';
                                        } 
                                        ?>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                      </div>
              </div>  
          </div>  
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