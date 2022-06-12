        <div class="card">
              <div class="card-header">
                <b style="font-size: 17px">#<?php echo $row['id'];?></b>
                   <span class="badge text-bg-<?php echo $classe;?>"><?php echo $row['status'];?></span> 
                  
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
                    <p><b>Observação:</b> <?php echo $row['observacao']?></p>
                </div>
              </div>
              <div class="card-footer text-muted text-end">
                <div class="text-left">
                     <?php
                        if($classe != 'dark'){
                   ?>
                        <form action="../../Model/Funcionario/alterarStPedido.php" method="POST">
                            <select name="status" class="form-select-sm">
                              <option value="Enviado" <?php echo $classe == 'primary'?'selected':'' ?>>Enviado</option>
                              <option value="Preparo" <?php echo $classe == 'info'?'selected':'' ?>>Em preparo</option>
                              <option value="Caminho" <?php echo $classe == 'success'?'selected':'' ?>>A Caminho</option>
                            </select>
                            <input type="hidden" name="pedido" value="<?php echo $row['id'];?>">
                            <button type="submit" name="alterar" class="btn btn-primary btn-sm">Alterar</button>
                        </form>
                    <?php
                        }
                    ?>
                </div>
              </div>
            </div>
        <br>