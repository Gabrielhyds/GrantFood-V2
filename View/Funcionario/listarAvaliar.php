<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

//verifica se a sessão usuario existe  
require_once('includes/sessao.php');

//inclui a foto de perfil do usuário
include 'includes/foto.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>GrantFood - Listar avaliações</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.jpg">


    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
 
  <link rel="stylesheet" href="assets/css/demo.css">
  <link rel="stylesheet" href="assets/css/style.css">
    <style>
        input[type=text]::placeholder {
          color: black;
        }
        
        input[type=password]::placeholder {
          color: black;
        }
        
        input[type=number]::placeholder {
          color: black;
        }
        label{
          color:#ff3a0b;
        }
    </style>
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
                                <img  class="img d-flex align-items-center justify-content-center" src="assets/img/FotoPerfil/bg.jpg" alt="" style="width:95px;height: 75px;">
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
                        <li class="active">
                            <a href="listarAvaliar.php"><i class="ion ion-star"></i><span>Avaliações</span></a>
                        </li>
                        <li >
                            <a href="relatorioVendas.php"><i class="ion ion-clipboard"></i><span>Relatorio de vendas</span></a>
                        </li>
                </aside>
            </div>
            <div class="main-content">
                <section class="section">
                    <h1 class="section-header">
                        <div>Avaliações dos clientes
                        </div>
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
            <div class="row mt-4">
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card card-sm-4">
                  <div class="card-icon bg-primary">
                    <i class="ion ion-ios-paper-outline"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total avaliações</h4>
                    </div>
                    <div class="card-body">
                    <?php $sql = "SELECT COUNT(*) AS total FROM avaliacao;"; $sql = $connection->query($sql);?>
                    <?php $sql= $sql->fetch_assoc();
                        echo $sql['total'];?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card card-sm-4">
                  <div class="card-icon bg-warning">
                    <i class="ion ion-paper-airplane"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>5 estrelas</h4>
                    </div>
                    <div class="card-body">
                    <?php 
                        $sql = "SELECT COUNT(qtdEstrela) AS total FROM avaliacao WHERE qtdEstrela = 5"; 
                        $sql = $connection->query($sql);
                        $sql= $sql->fetch_assoc();
                        echo $sql['total'];?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-4">
                <div class="card card-sm-4">
                  <div class="card-icon bg-dark">
                    <i class="ion ion-record"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Comentários</h4>
                    </div>
                    <div class="card-body">
                    <?php 
                        $sql = "SELECT COUNT(comentario) AS total FROM avaliacao"; 
                        $sql = $connection->query($sql);
                        $sql= $sql->fetch_assoc();
                        echo $sql['total'];?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div>
              <?php $sql = "SELECT * FROM avaliacao;"; $result = $connection->query($sql);?>
              <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-header">
                                <h4>Avaliações</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Estrelas</th>
                                        <th>Comentário</th>
                                        <th>Data/Hora</th>
                                        <th>Mesa</th>
                                    </tr>

                                    <?php if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {?> 
                                        <tr>
                                            <th><?php echo $row["id"]; ?></th>
                                            <td>
                                            <?php
                                                switch($row["qtdEstrela"]){
                                                    case 1:
                                                            ?>
                                                              <i class="ion ion-star"></i>  
                                                            <?php
                                                        break;
                                                    case 2:
                                                            ?>
                                                              <i class="ion ion-star"></i><i class="ion ion-star"></i>  
                                                            <?php
                                                        break;
                                                    case 3:
                                                            ?>
                                                              <i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i>   
                                                            <?php
                                                        break;
                                                    case 4:
                                                            ?>
                                                              <i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i>   
                                                            <?php
                                                        break;
                                                    case 5:
                                                            ?>
                                                              <i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i><i class="ion ion-star"></i>   
                                                            <?php
                                                        break;
                                                }
                                                echo '('.$row["qtdEstrela"].')';
                                            ?>
                                            </td>
                                            <td><?php echo $row["comentario"] == NULL?'Sem comentário.':$row["comentario"]; ?></td>
                                            <td><?php echo $row["data_hora"]; ?></td>
                                            <td><?php echo $row["codMesa"]; ?></td>
                                            
                                        </tr>
                                    <?php   }}else{echo '<div class="alert alert-danger" role="alert">
                                                            Nenhuma avaliação cadastrada! &#128552
                                                        </div>';
                                            } ?> 
                                </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                      </div>
              </div>
             
              </div>
            </form><br><br>
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