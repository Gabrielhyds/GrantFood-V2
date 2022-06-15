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
                            <input type="hidden" name="statusEnvi" value="Enviado">
                            <input type="hidden" name="statusCamin" value="Caminho">
                            <input type="hidden" name="pedido" value="<?php echo $row['id']?>">
                            <button type="submit" class="btn-status" name="btnEnviado" style="background-color: #574B90;"><span class="ion-paper-airplane"></span> Enviado</button>
                            <button type="submit" class="btn-status" name="btnCaminho" style="background-color: #28a745;"><span class="ion-android-checkmark-circle"></span> Caminho</button>
                        </form>
                    </div>
                  </div> 
                  
              </div>
              <div class="card-body">
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
              <div class="card-footer text-muted text-right">
                <?php echo $row['data']?>
              </div>
            </div>
        <br>