<?php 
    if(isset($_GET["idMesa"])){
          $idMesa = $_GET["idMesa"];
    }else{
        $erro = 1;
    }
?>

<div class="container">
    <div class="row" style="color: black;"> 
      <div align="center">
        <h3>Baixar QRCode</h5>
        <hr>
      </div>
    </div> 
</div>
<div class="container"> 
  <div class="row" style="height: 200px">
  <div class="col-md-6" style="margin: 0px; ">
    <?php 
          $code = 'projeto/Views/Cliente/Entrar/index.php?mesa='. $idMesa . ''; //EDITAR ISSO NA ETEC
        ?>
       <div style="padding-top: 30px; padding-left: 180px">
        <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $code?>&choe=UTF-8'>
        <b style="padding-left: 60px">QRCode da Mesa:</b> Nº <?php echo $idMesa?> 
      </div>
  </div>
  <div class="col-md-6" style="padding-top: 50px;">
    <a href="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $code?>&choe=UTF-8" download="QRCode">
    <button type="button" class="btn btn-success">Baixar</button>
  </div></div>
        
</div>