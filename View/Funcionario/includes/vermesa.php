<?php
    if(isset($_GET["telas"])){
        if(isset($_GET["idMesa"])){
            if($_GET["telas"] == "vermesa"){
                $idMesa = $_GET["idMesa"];
            } 
        }else{
            $erro = 1;
        }
        
    }

    if(!isset($erro)){

    $sqlSessao = "SELECT codSessao FROM sessao WHERE codMesa = '$idMesa'";
    $result = mysqli_query($connection, $sqlSessao);
    $row = mysqli_fetch_array($result);

    if(@$row['codSessao'] != ''){
        $codSessao = $row['codSessao'];
    }else{
        $codSessao = 'Nenhuma sessão ativa';
    }
?>

    <h2 class="mb-4">Ver mesa (detalhes) - Mesa #<?php echo $idMesa;?></h2>
    <div class="row">
        <span>SESSAO:  <?php echo $codSessao;?></span>
    </div>
    <div class="row">
        <div class="text-end">
            <form action="../../Model/Funcionario/finalizarMesa.php" method="POST">
                <input type="hidden" name="mesa" value="<?php echo $idMesa?>">
                <button type="submit" name="finalizar" class="btn btn-danger">Finalizar mesa</button>
                <button type="button"  onclick="window.location.href='statusMesa.php?telas=baixarQR&idMesa=<?php echo $idMesa;?>'" class="btn btn-success">Baixar QRCode</button>
            </form>
            
        </div>
    </div>
    <br>
    <?php
            $sql = "SELECT * FROM pedido WHERE mesa = '$idMesa'";
            
            $result = mysqli_query($connection, $sql);
            
            if(@mysqli_num_rows($result) > 0)
            {
    ?>
    <div class="card  text-bg-info" style="padding: 20px;">
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
            ?>
            <div class="card">
              <div class="card-header">
                <b style="font-size: 17px">#<?php echo $row['id'];?></b>
                   <span class="badge text-bg-<?php echo $classe;?>"><?php echo $row['status'];?></span> 
                  
              </div>
              <div class="card-body">

                <!--<h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>-->

                <?php
                    $total = 0;
                    $numero = $row['id'];
                    $sql2 = "SELECT pi.id, pi.item, pi.quantidade, pi.preco, pi.total FROM pedidoitem as pi 
                             INNER JOIN pedido as p on p.id = pi.codPedido WHERE pi.codPedido = '$numero' AND pi.mesa = '$idMesa'";

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
                $total = $total + $values['total'];
                              }
                           }
                       }
                ?>

                <div class="row">
                    <p><b>Observação:</b> <?php echo $row['observacao']?></p>
                    <p class="card-text text-end">
                        <b>Total:</b> <?php echo $total;?>
                    </p>
                </div>
              </div>
              <div class="card-footer text-muted text-end">
                <div class="text-left">
                     <?php
                        if($classe != 'dark'){
                   ?>
                        <form action="../../Model/Funcionario/alterarMesa.php" method="POST">
                            <select name="status" class="form-select-sm">
                              <option value="Enviado" <?php echo $classe == 'primary'?'selected':'' ?>>Enviado</option>
                              <option value="Preparo" <?php echo $classe == 'info'?'selected':'' ?>>Em preparo</option>
                              <option value="Caminho" <?php echo $classe == 'success'?'selected':'' ?>>A Caminho</option>
                              <option value="Pagar" <?php echo $classe == 'warning'?'selected':'' ?>>A Pagar</option>
                            </select>
                            <input type="hidden" name="mesa" value="<?php echo $idMesa;?>">
                            <input type="hidden" name="pedido" value="<?php echo $row['id'];?>">
                            <button type="submit" name="alterar" class="btn btn-primary btn-sm">Alterar</button>
                        </form>
                    <?php
                        }
                    ?>
                </div>
                <?php 
                    echo date('H:i:s d/m/Y ', strtotime($row['data']));
                    if($classe == 'warning'){
                ?>
                <a href="statusMesa.php?telas=pagarindi&idMesa=<?php echo $idMesa;?>&idPedido=<?php echo $numero?>" class="btn btn-primary">Pagar</a>
                <?php
                    }else if($classe != 'dark'){
                        ?>
                        <?php 
                    }
                ?>
              </div>
            </div>
            <br>
          <?php
              }
            ?>
                <div class="text-center">
                    <a href="statusMesa.php?telas=pagartudo&idMesa=<?php echo $idMesa;?>" class="btn btn-primary">Pagar tudo</a>
                </div>
          <?php
            }
          ?>
          
    </div>
            
<?php
    }else{
        ?>
            <h2 class="mb-4">ERRO! Selecione uma mesa novamento (ERROR ID= isset&idMesa)</h2>
        <?php
    }

