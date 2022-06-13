<?php
  include('../../Banco/Conexao.php');
  session_start();
  if(!isset($_SESSION['mesa']))
  {
    header("location: entrar");
    exit;
  }
  $idSessao = $_SESSION['chave'];
  $sqlSessao = "SELECT codSessao FROM logsessao WHERE codSessao = '$idSessao'";
  $result = mysqli_query($connection, $sqlSessao);
  $row = mysqli_fetch_array($result);

  if(!empty($row['codSessao'])){
      header("location: entrar");
    exit;
  }
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <?php
      echo "<meta HTTP-EQUIV='refresh' CONTENT='10'>";
    ?>
  <link rel="shortcut icon" href="assets/images/favicon.png" type="">

  <title> GrantFood </title>

  <!-- bootstrap core css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <script src="https://kit.fontawesome.com/d9f3da8e1a.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


  <!-- Custom styles for this template -->
  <link href="assets/../assets/css/style.css" rel="stylesheet" />
   <link href="assets/../assets/css/carrinho.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="assets/css/responsive.css" rel="stylesheet" />
  <style>
    .estrelas input[type=radio] {
    display: none;
      }

      .estrelas label i.fa:before {
          content: '\f005';
          color: #FC0;
      }

      .estrelas input[type=radio]:checked~label i.fa:before {
          color: #CCC;
      }

      .botao{
        padding: 10px;
        color: white;
        background-color: black;
        margin-left: 15px;
        border: none; 
        font-size: 13px;
        font-weight: bold;
      }
  </style>
</head>

<body class="sub_page" >

  <div class="hero_area">
    <div class="bg-box">
      <img src="assets/images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="cardapio.php">
            <span>
              GrantFood
            </span>
          </a>

          

           
            <ul class="navbar-nav  mx-auto ">             
                                         
            </ul>
            <div class="user_option">
              <a class="cart_link" href="carrinho.php">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                </svg>
               
              </a>
              <a href="pedidos.php" class="order_online">
                Pedidos
              </a>
            </div>
            
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Pedidos
        </h2>
      </div>
        <br>
        <?php 
        if(isset($_GET['success'])){
          if($_GET['success'] == 'fecharConta'){
            ?>
              <div class="alert alert-warning sucesso" role="alert">
                O garçom virá até você para finalizar a conta. Aguarde! 👍
              </div>
            <?php
            include 'avaliar.php';
          }else if($_GET['success'] == 'pedidoFeito'){
            ?> 
                <form action="../../Model/Cliente/fecharConta.php" method="POST">
                  <button type="submit" class="btn" name="update">Fechar conta</button>
                </form>
            <?php
          }
          if($_GET['success'] == 'avaliar'){
                if(isset($_SESSION['msg'])){
                  echo $_SESSION['msg']."<br><br>";
                  unset($_SESSION['msg']);
                }
          }
        }else{
          ?> 
                <form action="../../Model/Cliente/fecharConta.php" method="POST">
                  <button type="submit" class="btn" name="update">Fechar conta</button>
                </form>
            <?php
        }
        $sessao = $_SESSION['chave'];
        $sql = "SELECT * FROM pedido WHERE sessao = '$sessao' ORDER BY id DESC";
                      
        $gotResuslts1 = mysqli_query($connection,$sql);
                                            
          if($gotResuslts1){
            if(mysqli_num_rows($gotResuslts1)>0){
              while($row1 = mysqli_fetch_array($gotResuslts1)){
              $numero = $row1['id'];
        ?>
        
        <div class="row">
          <div class="card">
                <div class="col-md-12 cart">
                    <div class="title">
                        <div class="row">
                          
                            <div class="col">
                                <h4><b>Nº <?php echo $numero; ?></b>
                                <?php 
                                  switch ($row1['status']) {
                                    case 'Enviado':
                                      ?><span class="badge bg-primary text-white">Enviado</span>
                                      <?php
                                      break;
                                    case 'Preparo':
                                      ?><span class="badge bg-info text-dark">Em preparo</span>
                                      <?php
                                      break;
                                    case 'Caminho':
                                      ?><span class="badge bg-success text-white">A caminho</span>
                                      <?php
                                      break;
                                    case 'Pagar':
                                      ?><span class="badge bg-warning text-dark">A pagar</span>
                                      <?php
                                      break;
                                    case 'Finalizado':
                                      ?><span class="badge bg-dark">Finalizado</span>
                                      <?php
                                      break;
                                  }
                                ?>
                              </h4>
                            </div>
                        </div>
                        
                    </div>
                    <?php 
                    $total = 0;
                    $sessao = $_SESSION['chave'];
                                $sql2 = "SELECT pi.id, pi.item, pi.quantidade, pi.preco, pi.total, pi.idProduto FROM pedidoitem as pi 
                             INNER JOIN pedido as p on p.id = pi.codPedido WHERE pi.codPedido = '$numero'";

                                $gotResuslts2 = mysqli_query($connection,$sql2);
                                if($gotResuslts2){
                                    if(mysqli_num_rows($gotResuslts2)>0){
                                       while($values = mysqli_fetch_array($gotResuslts2)){
                                        $idProduto = $values['idProduto'];
                                        $imgProduto = "SELECT image FROM produtos WHERE id = '$idProduto'";
                                        $results = mysqli_query($connection, $imgProduto);
                                        if($results){
                                          $produto = mysqli_fetch_array($results);
                                        }

                     ?>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="../Funcionario/assets/img/food/<?php echo $produto["image"] . ""; ?>"></div>
                            <div class="col">
                                <div class="row text-muted"><?php echo $values["item"]; ?></div>
                            </div>
                            <div class="col"><a href="#" class="border"><?php echo $values["quantidade"]; ?></a></div>
                            <div class="col">R$ <?php echo $values["preco"]; ?></div>
                        </div>
                    </div>
                    <?php
                      $total = $total + $values['total'];
                      $status = $row1['status'];
                              }
                           }
                       }
                       ?>
                    <br>
                    <span class="col align-self-center text-right ">Observação:</span><span class="text-muted"><?php echo $row1['observacao']; ?></span>
                    <br><br>
                    <h4 class="col align-self-center text-right ">Total: R$ <?php echo number_format($total, 2); ?> </h5>
                    <div class="back-to-shop"><a href="Cardapio.php">&leftarrow;</a><span class="text-muted">Voltar ao cardápio</span></div>
                    <?php
                      if($status == 'Enviado'){
                    ?>
                    <div class="row" id="botao">
                      <form action="../../Model/Cliente/cancelarPedido.php" method="POST">
                          <input type="hidden" name="numero" value="<?php echo $numero;?>">
                          <button class="btn" type="submit" name="cancelar">Cancelar pedido</button> 
                      </form>
                    </div>
                    <?php
                      }else{
                    ?>  
                      <br>
                      <span>Pedido confirmado.</span>
                    <?php
                       }
                    ?>
                </div>
          </div> 
        </div> 
        <br>
        <?php
                }
              }else{
                ?>
                  <div class="row">
                    <div class="card">
                      <div class="col-md-12 cart">
                        <div class="title">
                          <div class="row">
                            <div class="col">
                            <h4><b>Nenhum pedido encontrado.</b></h4>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
              }
            }
          ?>              
        
    </div>
  </section>

  <!-- end food section -->

  <!-- footer section -->
  <?php include 'footer.php'?>
  <!-- footer section -->

  <!-- jQery -->
  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>