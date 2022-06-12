<br>
  <div class="container">
    <div class="row" style="color: white;"> 
      <div align="center">
        <h3 style="color:black">Lista de mesas</h5>
        <hr>
      </div>
    </div> 
    <div class="row">
      <div align="right">
        <a href="?telas=addmesa" class="btn btn-success">Adicionar mesa</a>
        <a href="?telas=removemesa" class="btn btn-danger">Apagar mesa</a>
      </div>
    </div>
  </div>
  
  <div class="container">
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
                    <div class="color-block-text">
                    <br>Mesa <?php echo $row['numero'];?>
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
                    <div class="color-block-text">
                      <br>Mesa <?php echo $row['numero'];?>
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
                      <div class="color-block-text">
                      <br>Mesa <?php echo $row['numero'];?>
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
      <!--<div class="<?php echo $status ?> col-md-3">
        <div class="txt">
          <a href="?telas=vermesa&idMesa=<?php echo $row['numero']?>">Mesa <?php echo $row['numero'];?></a>
        </div>
      </div>-->
      <?php
          }
        }
      ?>
      
    </div>
  </div>