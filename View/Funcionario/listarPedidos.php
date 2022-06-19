<?php

// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

//verifica se a sessão usuario existe  
//require_once('includes/sessao.php');

//inclui a foto do usuário
include_once "includes/foto.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>GrantFood - Listar pedidos</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.jpg">


    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="assets/css/demo.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <?php
    if(!isset($_GET['telas'])){
      echo "<meta HTTP-EQUIV='refresh' CONTENT='20'>";
    }
      
    ?>
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

      .btn-status{
          border: none;
          border-radius: 30px;
          color: white;
          font-weight: 500;
          font-size: 11px;
;
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
                                <img  class="img d-flex align-items-center justify-content-center" src="assets/img/bg.jpg" alt="" style="width:78px;height: 75px;">
                            <?php }?>
                        </div>
                        <div class="sidebar-user-details">
                            <div class="user-name"><?php echo $_SESSION['usuario'];?></div>
                            <div class="user-role">
                                Cozinha
                            </div>
                        </div>
                    </div>
                    <ul class="sidebar-menu">

                        <li class="menu-header">Opções</li>
                        <li class="active">
                            <a href="listarPedidos.php"><i class="ion ion-clipboard"></i><span>Listar Pedidos</span></a>
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
                        <div>Pedidos</div>
                    </h1>


                    <?php
            $sql = "SELECT * FROM pedido WHERE status = 'Enviado' OR status = 'Preparo' ORDER BY id asc";
            
            $result = mysqli_query($connection, $sql);
            
            if(@mysqli_num_rows($result) > 0)
            {
              $linhas = mysqli_num_rows($result);

    ?>

    <div class="container">
      <div class="row">
        <b style="font-size: 20px">Nº de pedidos: <span style="color: blue; font-size: 25px"><?php echo $linhas;?></span></b> 
      </div>
      <div class="col-md-12 text-right">
        <button type="button"  onclick="window.location.href='listarPedidos.php?telas=pedidosPreparar'" class="btn btn-success">Pedidos em preparo</button>
      </div>
      <br>
    </div>
    <div class="card  text-bg-info" style="background-color: #0d3180; padding: 20px;">
        <div class="card-header text-center text-white">
            <h5 class="card-title">Pedidos</h5>
        </div>
        <br>
        <?php
              while($row = mysqli_fetch_array($result))
              {
                switch($row['status']){
                  case 'Enviado':
                      $classe = 'primary';
                      break;
                  case 'Preparo':
                      $classe = 'info';
                      break;
                  case 'Caminho':
                      $classe = 'success';
                      break;
                  case 'Pagar':
                      $classe = 'warning';
                      break;
                  case 'Finalizado':
                      $classe = 'dark';
                      break;
                }

              
            if(!isset($_GET['telas']) && $classe == 'primary'){
            ?>

            <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-md-4">
                            <b style="font-size: 17px">#<?php echo $row['id'];?></b>
                            <span class="badge badge-<?php echo $classe;?>"><?php echo $row['status'];?></span> 
                      </div>
                      <div class="col-md-8 text-right">
                        <!-- Status enviado -->
                        <b>Alterar status:</b>
                        <form action="" method="post">
                            <input type="hidden" name="statusPrep" value="Preparo">
                            <input type="hidden" name="pedido" value="<?php echo $row['id']?>">
                            <button type="submit" class="btn-status" name="btnPreparo" style="background-color: #17a2b8;"><span class="ion-android-restaurant"></span> Preparo</button>
                        </form>
                    </div>
                  </div>
                    
                  
              </div>
              <div class="card-body">
                <div class="row border-top border-bottom">
                    <div class="col"><b>ID</b></div>
                    <div class="col"><b>Item</b></div>
                    <div class="col"><b>Quantidade</b></div>
                    <div class="col"><b>Valor</b></div>
                </div>
                <?php
                    $total = 0;
                    $numero = $row['id'];
                    $sql2 = "SELECT pi.id, pi.item, pi.quantidade, pi.preco, pi.total FROM pedidoitem as pi 
                             INNER JOIN pedido as p on p.id = pi.codPedido WHERE pi.codPedido = '$numero'";

                             $gotResuslts2 = mysqli_query($connection,$sql2);
                                if($gotResuslts2){
                                    if(mysqli_num_rows($gotResuslts2)>0){
                                       while($values = mysqli_fetch_array($gotResuslts2)){
                ?>
                <div class="row border-top border-bottom" style="margin:10px; padding: 10px;">
                    <div class="col"><b>#<?php echo $values['id']?></b></div>
                    <div class="col"><?php echo $values['item']?></div>
                    <div class="col"><?php echo $values['quantidade']?></div>
                    <div class="col">R$ <?php echo $values['total']?></div>
                </div>
                <?php
                              }
                           }
                       }
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <p><b>Observação:</b> <?php echo $row['observacao']?></p>
                    </div>
                    
                </div>
              </div>
              <div class="card-footer text-muted text-end">
                <div class="text-right">
                     <?php echo $row['data']?>
                </div>
              </div>
            </div>
            <br>
            <?php
                } else if(isset($_GET['telas']) == 'pedidosPreparar' && $classe == 'info'){
                  include ('includes/pedidosPreparar.php');
                }
              ?>
            
          <?php
              }
            }else{
              ?>
                <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                <div class="alert-icon"><i class="ion ion-ios-lightbulb-outline"></i></div>
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                    </button>
                    <div class="alert-title">Atenção</div>
                    <b>Nenhum</b> pedido
                </div>
                </div>
              <?php
            }
          ?>
          
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
  
  <script src="assets/js/cepFunc.js"></script>
</body>

</html>

<?php
if(isset($_POST['btnEnviado'])){
	$status = $_POST['statusEnvi'];
    $idPedido = $_POST['pedido'];

    if(!empty($idPedido)){
        $sql = "UPDATE pedido SET status = '$status' WHERE id = '$idPedido'";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
        	header('Location: ?foi');
        }else{
        	header('Location: ?erro=sql');
        }

        
    }else{
    	header('Location: ');
    }
}

if(isset($_POST['btnPreparo'])){
	$status = $_POST['statusPrep'];
    $idPedido = $_POST['pedido'];

    if(!empty($idPedido)){
        $sql = "UPDATE pedido SET status = '$status' WHERE id = '$idPedido'";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
        	header('Location: ?foi');
        }else{
        	header('Location: ?erro=sql');
        }

        
    }else{
    	header('Location: ');
    }
}

if(isset($_POST['btnCaminho'])){
	$status = $_POST['statusCamin'];
    $idPedido = $_POST['pedido'];

    if(!empty($idPedido)){
        $sql = "UPDATE pedido SET status = '$status' WHERE id = '$idPedido'";
        $results1  = mysqli_query($connection, $sql);

        if($results1){
        	header('Location: ?foi');
        }else{
        	header('Location: ?erro=sql');
        }

        
    }else{
    	header('Location: ');
    }
}
?>