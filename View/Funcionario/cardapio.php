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
                        <li>
                            <a href="#" class="has-dropdown"><i class="ion ion-ios-people"></i><span>Funcionários</span></a>
                            <ul class="menu-dropdown">
                                <li><a href="CadastrarFunc.php"><i class="ion ion-person-add"></i>Cadastrar Funcionário</a></li>
                                <li ><a href="listarFunc.php"><i class="ion ion-ios-eye"></i>Consultar Funcionário</a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="#" class="has-dropdown"><i class="ion ion-ios-cart"></i><span>Cardápio</span></a>
                            <ul class="menu-dropdown">
                                <li class="active"><a href="cardapio.php"><i class="ion ion-pizza"></i>Cadastrar Produto</a></li>
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
                        <div>Cardápio - Categoria</div>
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
              <form action="../../Model/Funcionario/cadastrarCad.php" method="POST" enctype="multipart/form-data">
                <fieldset class="scheduler-border" style="border: 1px solid #3D5A80; border-radius: 4px;">
                  <legend class="scheduler-border" style="background: #3D5A80; border-radius: 4px"><span style="padding-left: 21px">Adicionar ao cardápio</span></legend>
                    <div class="control-group">
                        <table style="position: relative; bottom: 70px;">
                        <!--Produto-->
                        
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-primary" type="button" id="button-addon1" style="width: 150px" disabled><span class="texto">Produto</span></button></td>
                            <td><input type="text" class="form-control" placeholder="" name="nome" aria-label="Example text with button addon" aria-describedby="button-addon1" style="position: relative; top: 5px; left: 5px; width: 420px" required></td>
                        </div>
                        </tr>

                        <!--Descrição-->
                        <tr>
                        <div class="input-group mb-3"> 
                            <td><button class="btn btn-secondary" type="button" id="button-addon1"style="width: 150px" disabled><span class="texto">Descrição</span></button></td>
                            <td><input type="text" class="form-control" placeholder="" name="descricao"  aria-label="Example text with button addon" aria-describedby="button-addon1" style="position: relative; top: 5px; left: 5px" ></td>
                            <td></td>
                        </div>
                        </tr>
                        
                        <!--Categoria-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-outline-success" type="button" id="button-addon1" style="background: red; border: 1px solid red; color: white; width: 150px" disabled><span class="texto">Categoria</span></button></td>
                            <td>
                              <select class="form-control" style="position: relative; top: 5px; left: 5px" name="categoria" required>
                              <option value="" disabled selected>Selecione</option>  
                                <?php
                                    $result_categoria = "SELECT * FROM categoria";
                                    $resultado_categoria = mysqli_query($connection, $result_categoria);
                                    while($row_categoria = mysqli_fetch_assoc($resultado_categoria)){ ?>
                                      <option value="<?php echo $row_categoria['id']; ?>"><?php echo $row_categoria['nomeCat']; ?></option> <?php
                                    }
                                  ?>
                              </select>
                            </td>
                        </div>
                        </tr>

                         <!--Inserir Imagem-->
                         <tr>
                            <div class="input-group mb-3">
                              <td><button class="btn btn-warning" type="button" id="button-addon1" style=" color: white; width: 150px;" disabled><span class="texto">Insira a imagem</span></button></tc>
                              <td><input type="file" class="form-control" id="inputGroupFile03" name="imagem" aria-describedby="inputGroupFileAddon03" aria-label="Upload" style="margin-left:5px;margin-top:8px"  required></div></td>
                            </div>
                         </tr>

                        <!--Preço-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-outline-success" type="button" id="button-addon1"  style="background-color: green; color: white; width: 150px" disabled><span class="texto">Preço</span></button></td>
                            <td><input type="number" class="form-control" placeholder="" name="preco" aria-label="Example text with button addon" aria-describedby="button-addon1" style="width: 150px; position: relative; top: 5px; left: 5px"  required></td>
                            <td style="position: relative; top: 5px; right: 300px; color: black;">R$</td>
                        </div>
                        </tr>

                          <!--Inserir e Remover-->
                          <tr>
                            <div class="input-group mb-3">
                              <td style="position: relative;  top: 20px"><button type="submit" name="btnCadastrar" class="btn btn-success" style="font-family: arial; font-weight: bold"><span class="fa fa-plus mr-1"></span>Adicionar</button>
                            
                              <td  style="position: relative;  top: 20px"><button type="reset" name="btnLimpar" class="btn btn-danger" style="font-family: arial; font-weight: bold"><span class="fa fa-trash mr-1"></span>Limpar</button></td>
                            </div>
                          </tr>
                        </table>
                    </div>
                </fieldset>
              </form>

              <form action="../../Model/Funcionario/cadCategoria.php" method="POST" enctype="multipart/form-data">
                <fieldset class="scheduler-border" style="border: 1px solid #3D5A80; border-radius: 4px;">
                  <legend class="scheduler-border" style="background: #3D5A80; border-radius: 4px"><span style="padding-left: 21px">Adicione a categoria</span></legend>
                    <div class="control-group">
                      <table style="position: relative; ">
                        <!--nome da categoria-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-primary" type="button" id="button-addon1" style="width: 200px" disabled><span class="texto">Categoria</span></button></td>
                            <td><input type="text" class="form-control" placeholder="" name="nome" aria-label="Example text with button addon" aria-describedby="button-addon1" style="position: relative; top: 5px; left: 5px; width: 420px" required></td>
                        </div>
                        </tr>
                          <!-- btn Inserir e Remover-->
                          <tr>
                            <div class="input-group mb-3">
                              <td style="position: relative;  top: 20px"><button type="submit" name="btnCad" class="btn btn-success" style="font-family: arial; font-weight: bold"><span class="fa fa-plus mr-1"></span>Adicionar</button></td>
                            
                              <td  style="position: relative;  top: 20px;left:-50px"><button type="reset" name="btnLimpar" class="btn btn-danger" style="font-family: arial; font-weight: bold"><span class="fa fa-trash mr-1"></span>Limpar</button></td>
                            </div>
                          </tr>
                        </table><br><br>
                    </div>
                </fieldset>
              </form>
            </div>

        
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left" style="color:black;">
                    COPYRIGHT &copy; 2022
                    <div class="bullet"></div> Todos os direitos reservados a Gran-Food</a>
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