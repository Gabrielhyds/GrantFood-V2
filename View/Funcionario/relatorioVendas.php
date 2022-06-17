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
    <title>GrantFood - Relatório de vendas</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.jpg">


    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
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
                        <li>
                            <a href="#" class="has-dropdown"><i class="ion ion-ios-people"></i><span>Funcionários</span></a>
                            <ul class="menu-dropdown">
                                <li><a href="CadastrarFunc.php"><i class="ion ion-person-add"></i>Cadastrar Funcionário</a></li>
                                <li ><a href="listarFunc.php"><i class="ion ion-ios-eye"></i>Consultar Funcionário</a></li>
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
                        <li>
                            <a href="listarAvaliar.php"><i class="ion ion-star"></i><span>Avaliações</span></a>
                        </li>
                        <li class="active">
                            <a href="relatorioVendas.php"><i class="ion ion-clipboard"></i><span>Relatório de vendas</span></a>
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
                        <div>Relatório de vendas</div>
                    </h1>
            <div class="row mt-12">
              <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Seleciona a categoria</h4>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Relatório Geral</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Relatório Mensal</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- relatorio Geral-->
                      <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Estatística</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive" style="overflow-x:hidden;">
                                            <table class="table table-striped" >
                                            <div class="row">
                                            <div class="col-12 col-sm-6 col-lg-3">
                                                    <?php if($_SESSION['resultado'] > 0){ ?>
                                                        <div class="card card-sm bg-success">
                                                        <div class="card-icon">
                                                         &#x24
                                                        </div>
                                                    <?php
                                                        }else{?>
                                                            <div class="card card-sm bg-danger">
                                                            <div class="card-icon">
                                                                &#128557	
                                                            </div>
                                                        <?php } ?>
                                                    <div class="card-wrap">
                                                        <div class="card-body">
                                                        <?php $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped;"; $sql1 = $connection->query($sql1);?>
                                                        <?php $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g;"; $sql2 = $connection->query($sql2);?>
                                                        <?php $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
                                                            $resultado = $sql1['logpedido'] - $sql2['valorGasto'];
                                                            echo $resultado = number_format($resultado, 2, ',','.');
                                                            $_SESSION['resultado'] = $resultado;
                                                            ?>
                                                        </div>
                                                        <div class="card-header">
                                                        <h4><?php if($resultado > 0){
                                                                 echo "Lucro";
                                                            }else{
                                                                echo "Prejuizo";
                                                                
                                                            }?></h4>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-lg-3">
                                                    <div class="card card-sm bg-primary">
                                                    <div class="card-icon">
                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="card-wrap">
                                                        <div class="card-body">
                                                        <?php $sql = "SELECT COUNT(*) AS total FROM logpedido;"; $sql = $connection->query($sql);?>
                                                        <?php $sql= $sql->fetch_assoc();
                                                            echo $sql['total'];?>
                                                        </div>
                                                        <div class="card-header">
                                                        <h4>Total de Pedidos</h4>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-lg-3">
                                                    <div class="card card-sm bg-warning">
                                                    <div class="card-icon">
                                                        <i class="ion ion-paper-airplane"></i>
                                                    </div>
                                                    <div class="card-wrap">
                                                        <div class="card-body">
                                                        <?php $sql = "SELECT sum(valor) AS total FROM gastos;"; $sql = $connection->query($sql);?>
                                                        <?php $sql= $sql->fetch_assoc();
                                                            $resultado = $sql['total'];
                                                            echo $resultado = number_format($resultado, 2, ',','.');
                                                        ?>
                                                        </div>
                                                        <div class="card-header">
                                                        <h4>Total de Gastos</h4>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6 col-lg-3">
                                                    <div class="card card-sm bg-dark">
                                                    <div class="card-icon">
                                                        <i class="ion ion-record"></i>
                                                    </div>
                                                    <div class="card-wrap">
                                                        <div class="card-body">
                                                        <?php $sql = "SELECT sum(preco) AS total FROM logpedido;"; $sql = $connection->query($sql);?>
                                                        <?php $sql= $sql->fetch_assoc();
                                                            $resultado =$sql['total'];
                                                            echo $resultado = number_format($resultado, 2, ',','.');
                                                        ?>
                                                        </div>
                                                        <div class="card-header">
                                                        <h4>Total de vendas</h4>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <form action="includes/Relatorio.php" method="POST">
                                                    <div>
                                                        <button class="btn btn-success" name="btnGerar" type="submit">Gerar PDF</button>
                                                    </div>
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>

                      <!-- LISTAR CONTAS-->
                      <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                      <div class="row mt-5">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                                <h4>Relatório Mensal</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="overflow-x:hidden;">
                                <table class="table table-striped">
                                <form action="includes/gerarPdf.php" method="POST">
                        <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                        ?>

                        <div class="row">
                            <div class="col-4 mb-3">
                               <label for="relatorio">Selecione o Mês</label>
                                <select class="form-control" name="estado" id="estado" required>
                                    <option value="0" disabled selected>Selecione</option>
                                    <option value="1">Janeiro</option>
                                    <option value="2">Fevereiro</option>
                                    <option value="3">Março</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Maio</option>
                                    <option value="6">Junho</option>
                                    <option value="7">Julho</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Setembro</option>
                                    <option value="10">Outubro</option>
                                    <option value="11">Novembro</option>
                                    <option value="12">Dezembro</option>
                                </select>                  
                            </div>
                            <div class="col-4 mb-3" style="margin-top:30px">
                                    <button class="btn btn-success" name="btnConsultar" type="submit">Consultar</button>
                            </div>
                        </div>
                        
                    </form>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                      </div>

                      <!-- LISTAR CONTAS-->
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
  <script src="assets/modules/chart.min.js"></script>
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
</body>

</html>


