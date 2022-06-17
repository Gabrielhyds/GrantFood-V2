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

    /*if(@$row['codSessao'] != ''){
        $codSessao = $row['codSessao'];
    }else{
        $codSessao = 'Nenhuma sessão ativa';
    }*/
?>

    <h2 class="mb-4">Mesa #<?php echo $idMesa;?> - Informações</h2>
    <div class="row">
        <div class="col-md-12">
            <span><b>SESSÃO:</b> 
            <?php
                 $sqlSessao = "SELECT codSessao FROM sessao WHERE codMesa = '$idMesa'";
                 $result = mysqli_query($connection, $sqlSessao);
                 if(mysqli_num_rows($result) > 0){
                     while($row = mysqli_fetch_array($result)){
                         ?>
                            <ins><?php echo $row['codSessao'];?></ins> -
                         <?php
                     }
                 }else{
                     ?>
                        <ins>Nenhuma sessão ativa.</ins>
                     <?php
                 }
            ?>
            </span>
        </div>
        
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <form action="../../Model/Funcionario/configMesa.php" method="POST">
                <input type="hidden" name="mesa" value="<?php echo $idMesa?>">
                <div class="email" onclick="this.classList.add('expand')">
                    <div class="from">
                    <button type="submit" name="apagar" class="btn btn-danger"><span class="ion-trash-a"></span> Apagar mesa</button>
                    </div>
                    <div class="to">
                    <div class="to-contents">
                        <div class="top">
                        <div class="name-large"><span class="ion-gear-a"></span> Configurações mesa</div>
                        <div class="x-touch" onclick="document.querySelector('.email').classList.remove('expand');event.stopPropagation();">
                            <div class="x">
                            <div class="line1"></div>
                            <div class="line2"></div>
                            </div>
                        </div>
                        </div>
                        <div class="bottom">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <span style="margin: 15px;">Você irá apagar a mesa: <b style="font-size: 18px;"><?php echo $idMesa?></b></span>
                                <button type="submit" name="apagar" class="btn btn-danger"><span class="ion-trash-a"></span> Apagar</button>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
        <div class="col-md-6 text-right">
                <button type="submit" name="finalizar" class="btn btn-danger"><span class="ion-close-circled"></span> Finalizar mesa</button>
                <button type="button"  onclick="window.location.href='statusMesa.php?telas=baixarQR&idMesa=<?php echo $idMesa;?>'" class="btn btn-success"><span class="ion-arrow-down-a"></span> Baixar QRCode</button>
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
    <div class="card  text-bg-info" style="background-color: #0d3180; padding: 20px;">
        <div class="card-header text-center text-white">
            <h5 class="card-title" style="color: white;">Pedidos</h5>
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
                  <div class="row">
                    <div class="col-md-4">
                        <b style="font-size: 17px">#<?php echo $row['id'];?></b>
                        <span class="badge badge-<?php echo $classe;?>"><?php echo $row['status'];?></span>
                    </div>
                    <?php
                        if($classe != 'dark'){
                   ?>
                    <div class="col-md-8 text-right">
                        <!-- Status enviado -->
                        <b>Alterar status:</b>
                        <form action="../../Model/Funcionario/alterarMesa.php" method="post">
                            <input type="hidden" name="statusEnvi" value="Enviado">
                            <input type="hidden" name="statusPrep" value="Preparo">
                            <input type="hidden" name="statusCamin" value="Caminho">
                            <input type="hidden" name="statusPagar" value="Pagar">
                            <input type="hidden" name="mesa" value="<?php echo $_GET['idMesa']?>">
                            <input type="hidden" name="pedido" value="<?php echo $row['id']?>">
                            <button type="submit" class="btn-status" name="btnEnviado" style="background-color: #574B90;"><span class="ion-paper-airplane"></span> Enviado</button>
                            <button type="submit" class="btn-status" name="btnPreparo" style="background-color: #17a2b8;"><span class="ion-android-restaurant"></span> Preparo</button>
                            <button type="submit" class="btn-status" name="btnCaminho" style="background-color: #28a745;"><span class="ion-android-checkmark-circle"></span> Caminho</button>
                            <button type="submit" class="btn-status" name="btnPagar" style="background-color: #ffc107;"><span class="ion-social-usd"></span> Pagar</button>
                        </form>
                    </div>
                    <?php
                        }
                    ?>
                  </div>
                  
                
                  
              </div>
              <div class="card-body">
                <div class="row border-top border-bottom">
                    <div class="col"><b>ID</b></div>
                    <div class="col"><b>Item</b></div>
                    <div class="col"><b>Quantidade</b></div>
                    <div class="col"><b>Valor</b></div>
                </div>
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
                    <div class="col">R$ <?php echo $resultado = number_format($values['total'], 2, ',','.');?></div>
                </div>
                <?php
                $total = $total + $values['total'];
                              }
                           }
                       }
                ?>

                <div class="row">
                    <div class="col-md-6">
                        <p><b>Observação:</b> <?php echo $row['observacao']?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text text-right">
                            <b>Total:</b> <ins><?php echo $resultado = number_format($total, 2, ',','.');?></ins>
                        </p>
                    </div>
                </div>
              </div>
              <div class="card-footer text-muted text-right">
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

