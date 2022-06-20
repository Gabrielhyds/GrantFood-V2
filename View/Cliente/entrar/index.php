<?php
  include('../../../Banco/Conexao.php');

  $mesa = filter_input(INPUT_GET, 'mesa', FILTER_SANITIZE_NUMBER_INT);
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
  <link rel="shortcut icon" href="../assets/images/favicon.png" type="">

  <title> Entrar </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="includes/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="includes/assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="includes/assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

  <link rel="stylesheet" href="includes/assets/css/demo.css">
  <link rel="stylesheet" href="includes/assets/css/style.css">




  <!-- Custom styles for this template -->
  <link href="../assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../assets/css/responsive.css" rel="stylesheet" />
  <style type="text/css">
   button {
      display: inline-block;
      padding: 10px 55px;
      background-color: #ffbe33;
      color: #ffffff;
      border-radius: 45px;
      -webkit-transition: all 0.3s;
      transition: all 0.3s;
      border: none;
  } 
    button:hover {
      background-color: #e69c00;
  }
  </style>
</head>

<body class="sub_page">
  <?php         
                        $sql = "SELECT * FROM sistema";

                        $gotResuslts = mysqli_query($connection,$sql);


                        if($gotResuslts){
                            if(mysqli_num_rows($gotResuslts)>0){
                                while($row = mysqli_fetch_array($gotResuslts)){
                                    if($row['status'] === 'Off'){
                                      include('includes/off.php');
                                      }else if(isset($_GET['success'])){
                              if($_GET['success'] == 'loggedOut'){
                                  ?>
                                  <div align="center">
                                    <h1>Você precisa escaniar o QR CODE da mesa novamente.</h1>
                                  </div>
                                  
                                  <?php
                              }
                          }else{
                                        ?>


  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Cardápio
        </h2>
      </div>
                  <div align="center">
                              <?php
                                  if(isset($_GET['error'])){

                                      if($_GET['error'] == 'Campos'){
                                          ?>
                                          <br>
                                          <div class="alert alert-danger " role="alert">
                                            Você precisa encaniar o QRCode novamente
                                          </div>
                                          <?php
                                      }else if($_GET['error'] == 'utilizada'){
                                          ?>
                                          <h4 style="color: red;"> Mesa já está sendo utilizada</h4>
                                          <?php
                                      }else if($_GET['error'] == 'mesanaoexiste'){
                                        ?>
                                        <h4 style="color: red;"> Esta mesa não existe no sistema</h4>
                                        <?php
                                    }
                                    }
                                  ?>
                              
                            </div>
      <div class="btn-box">
        <form action="processar.php" class="login-form" method="POST">
          <input type="number" name="mesa" hidden value="<?php echo $mesa?>">
              
              <button type="submit" name="submit2">
                
                  Veja Mais
                
              </button>
        </form>
        
      </div>
    </div>
  </section>

  <!-- end food section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              GrantFood
            </a>
            <p>
              Sempre trazendo o melhor prato até sua mesa.
            </p>
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br><br>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="../assets/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.js"></script>
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
<?php
                                      }
                                  }
                            }
                        }
                                    
       
    ?>


  <script src="includes/assets/js/scripts.js"></script>
</body>

</html>