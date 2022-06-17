<div class="container">
  <div class="row">
    <div class="col-md-4">
      <b style="font-size: 20px">Sistema: 
        <?php
          $sistema = "SELECT status FROM sistema WHERE id = '1'";
          $resultado =  mysqli_query($connection, $sistema);
          $linha = mysqli_fetch_array($resultado);

          $sisStatus = $linha['status'];

          switch($sisStatus){
            case 'Off':
                $valorStatus = 'dark';
                break;
            case 'On':
                $valorStatus = 'success';
                break;
            default:
                $valorStatus = 'dark';
                break;
          }
        ?>
      </b>
      <span class="badge badge-<?php echo $valorStatus;?>"><?php echo $linha['status'];?></span>
    </div>

    <div class="col-md-8 text-right">
      <!-- Status enviado -->
      <b>Alterar status:</b>
      <form action="../../Model/Funcionario/sistema.php" method="post">
          <?php if($sisStatus == 'On'){
            ?>            
              <button type="submit" class="btn-status badge badge-dark" name="btnOff"><span class="ion-close-circled"></span> Off</button>
            <?php
          }else{
            ?>          
              <button type="submit" class="btn-status badge badge-success" name="btnOn"><span class="ion-power"></span> On</button>
            <?php
          }
          ?>
      </form>
  </div>
  </div>
</div>
<?php
  if($sisStatus == 'On'){
?>
<br>
  <div class="container">
    <div class="row" style="color: white;"> 
      <div class="col-md-12" align="center">
        <h3 style="color:black">Lista de mesas</h5>
        <hr>
      </div>
    </div> 
    <div class="row">
      <div class="col-md-12" align="right">
        <a href="?telas=addmesa" class="btn btn-success"><span class="ion-plus"></span> Adicionar mesa</a>
      </div>
    </div>
  </div>
  <br>
  
      <?php 
          if(isset($_GET['success'])){
            if($_GET['success'] == 'apagada'){
              ?>
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="alert alert-success" role="alert">
                    Mesa <b><?php echo $_GET['mesaApagada']?></b> removida com sucesso!!!
                  </div>
                </div>
              </div>
              <?php
            } else if ($_GET['success'] == 'criada'){
              ?>
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="alert alert-success" role="alert">
                    Mesa <b><?php echo $_GET['mesaCriada']?></b> criada com sucesso!!!
                  </div>
                </div>
              </div>
              <?php
            }
          }
        ?>
      
    <div class="row">
    <?php
        $sql = "SELECT * FROM mesa ORDER BY numero ASC";
        
        $result = mysqli_query($connection, $sql);
        if(@mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
            $status = $row['STATUS'];

          if($status == 1){
            ?>
              <div class="col-xs-12 col-md-4">
                <div class="color-block-wrapper">
                  <div class="color-block color-block-green color-block-icon-lock">
                    <div class="color-block-head">
                     Disponível
                    </div>
                    <div class="color-block-head" style="color: black">
                      Lugares: <b style="font-size: 17px"><?php echo $row['lugares']?></b>
                      <br>
                      Usada: <b style="font-size: 17px"><?php echo $row['qtdUsada']?></b>
                    </div> 
                    <div class="color-block-text">
                    Mesa <?php echo $row['numero'];?>
                    </div>
                  </div>
                  <div class="color-block-bottom">
        <a href="?telas=vermesa&idMesa=<?php echo $row['numero']?>" class="btn btn-transparent-green">Ver mesa</a>
                  </div>
                </div>
              </div>
            <?php
          }else if($status == 2 ){
            ?>
              <div class="col-xs-12 col-md-4">
                <div class="color-block-wrapper">
                  <div class="color-block color-block-dblue color-block-icon-person">
                    <div class="color-block-head">
                      Ocupado
                    </div>
                    <div class="color-block-head" style="color: white">
                      Lugares: <b><?php echo $row['lugares']?></b><br>
                      Usada: <b style="font-size: 17px"><?php echo $row['qtdUsada']?></b>
                    </div> 
                    <div class="color-block-text">
                    Mesa <?php echo $row['numero'];?>
                    </div>
                  </div>
                  <div class="color-block-bottom">
        <a href="?telas=vermesa&idMesa=<?php echo $row['numero']?>" class="btn btn-transparent">Ver mesa</a>
                  </div>
                </div>
              </div>
            <?php
          }else if($status == 3){
              ?>
                <div class="col-xs-12 col-md-4">
                  <div class="color-block-wrapper">
                    <div class="color-block color-block-lblue color-block-icon-list">
                      <div class="color-block-head">
                        Fechar conta
                      </div>
                      <div class="color-block-head" style="color: white">
                        Lugares: <b><?php echo $row['lugares']?></b>
                        <br>
                        Usada: <b style="font-size: 17px"><?php echo $row['qtdUsada']?></b>
                      </div> 
                      <div class="color-block-text">
                        Mesa <?php echo $row['numero'];?>
                      </div>
                    </div>
                    <div class="color-block-bottom">
          <a href="?telas=vermesa&idMesa=<?php echo $row['numero']?>" class="btn btn-transparent-lblue">Ver mesa</a>
                    </div>
                  </div>
                </div>
              <?php
          }
        ?>
      <?php
          }
        }
      ?>
    </div>
  <?php
    }else{
      ?>
        <br>
        <div class="row">
          <div class="col-md-12 text-center">
            <h3>Sistema off.</h3>
          </div>
        </div>
        <hr>
        <?php 
          if(isset($_GET['success'])){
            if ($_GET['success'] == 'criada'){
              ?>
              <div class="row">
                <div class="col-md-12 text-center">
                  <div class="alert alert-success" role="alert">
                    Mesa <b><?php echo $_GET['mesaCriada']?></b> criada com sucesso!!!
                  </div>
                </div>
              </div>
              <?php
            }
          }
        ?>
        <div class="row">
          <div class="col-md-12" align="right">
            <a href="?telas=addmesa" class="btn btn-success"><span class="ion-plus"></span> Adicionar mesa</a>
          </div>
        </div>
      <?php
    }
  ?>