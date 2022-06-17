<?php
    unset($_SESSION["ids"]);
    if(isset($_GET["telas"])){
        if(isset($_GET["idMesa"])){
            if($_GET["telas"] == "pagartudo"){
                $idMesa = $_GET["idMesa"];
            } 
        }else{
            $erro = 1;
        }
        
    }
    

    if(!isset($erro)){
?>

    <h2 class="mb-4">Mesa #<?php echo $idMesa;?> - Informações</h2>
    <div class="card  text-bg-info" style="background-color: #0d3180; padding: 20px;">
        <div class="card-header text-center text-white">
            <h5 class="card-title">Pedidos detalhes</h5>
        </div>
        <div class="card-body">
        <br>
        <?php

            $geral = 0;
            $sql = "SELECT * FROM pedido WHERE mesa = '$idMesa' AND status != 'Finalizado' ORDER BY id DESC";
            
            $result = mysqli_query($connection, $sql);
            if(@mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_array($result))
              {
                if($row['status'] != 'Finalizado'){
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

                if(isset($_SESSION["ids"]))
                {
                    $count = count($_SESSION["ids"]);
                    $item_array = array(
                        'pedido_id'     =>  $row["id"]
                    );
                    $_SESSION["ids"][$count] = $item_array;
                }
                else
                {
                    $item_array = array(
                        'pedido_id'     =>  $row["id"]
                    );
                    $_SESSION["ids"][0] = $item_array;
                }
                
            ?>
            <div class="card">
              <div class="card-header">
                <b style="font-size: 17px">#<?php echo $row['id'];?></b>
                   <span class="badge badge-<?php echo $classe;?>"><?php echo $row['status'];?></span> 
                
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
                    <div class="col">R$ <?php echo $resultado = number_format($values['total'], 2, ',','.');?></div>                </div>
                <?php
                $total = $total + $values['total'];
                              }
                           }
                       }
                ?>

                <div class="row">
                    <div class="col-md-12">
                       <p class="card-text text-right">
                       <b>Total:</b> <ins><?php echo $resultado = number_format($total, 2, ',','.');?></ins>
                        </p> 
                    </div>
                </div>
            </div>
        </div>
          <?php
            $preco = $row['preco'];
            $geral = $geral + $preco;
                }
              }
              
            }
            if(mysqli_num_rows($result) != 0){
          ?>
            <div class="col-md-12 text-right">
                <h3 style="color: white;"><b>Total:</b> <?php echo $resultado = number_format($geral, 2, ',','.');?></h3>
            </div>
          <?php
            }
                        if(isset($_GET["status"])){
                            if($_GET["status"] == "pago"){
                                ?> 
                                <br>
                                <div class="alert alert-success" role="alert">
                                  <h4 class="alert-heading">Pedido finalizado!</h4>
                                  <p>Pedido foi pago, agora você já pode imprimir a nota fiscal.</p>
                                  <hr>
                                  <p class="mb-0"><b>Lembre-se de que finalizar o pedido, não finaliza a mesa.</b></p>
                                </div>
                                <div class="text-center">
                                    <a href="statusMesa.php?telas=vermesa&idMesa=<?php echo $idMesa;?>" class="btn btn-primary">Voltar</a>
                                </div>
                                <?php
                            }else if($_GET["status"] == "erro"){
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                     ERRO!
                                    </div>
                                <?php
                            }else if($_GET["status"] == "vazio"){
                                ?>
                                    <div class="alert alert-danger" role="alert">
                                     Não há pedidos para serem finalizados.
                                    </div>
                                <?php
                            }
                        }else if(mysqli_num_rows($result) != 0){
                            ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5 class="card-title text-white">Dados de pagamento</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <form action="../../Model/Funcionario/fecharConta.php" method="POST">
                                    <select class="form-select" name="metodo" aria-label="Default select example">
                                    <option value="0">Método de pagamento...</option>
                                      <option value="dinheiro">Dinheiro</option>
                                      <option value="debito">Cartão de débito</option>
                                      <option value="credito">Cartão de crédito</option>
                                      <option value="pix">Pix</option>
                                    </select>
                                    <input type="hidden" name="idPedido" value="<?php echo $numero?>">
                                    <input type="hidden" name="mesa" value="<?php echo $idMesa?>">
                            </div>
                        </div>
              </div>
                      
                      <div class="card-footer text-muted text-center">
                        <button class="btn btn-primary" name="geral" type="submit">Finalizar</button>
                      </div>

                      </form>
                            <?php
                        }
                    ?>
        </div>
    </div>
            
<?php
    }else{
        ?>
            <h2 class="mb-4">ERRO! Selecione uma mesa novamento (ERROR ID= isset&idMesa)</h2>
        <?php
    }

    if(isset($_POST["geral"]))
    {
      if(isset($_SESSION["ids"]))
      {
        $item_array_id = array_column($_SESSION["ids"], "pedido_id");
        /*if(!in_array($_GET["id"], $item_array_id))
        {*/
          $count = count($_SESSION["ids"]);
          $item_array = array(
            'pedido_id'     =>  $_GET["id"]
          );
          $_SESSION["shopping_cart"][$count] = $item_array;
          echo '<script>alert("Item adicionado")</script>';
        //}
        /*else
        {
          echo '<script>alert("Item já adicionado")</script>';
        }*/
      }
      else
      {
        $item_array = array(
          'item_id'     =>  $_GET["id"],
          'item_name'     =>  $_POST["hidden_nome"],
          'item_price'    =>  $_POST["hidden_preco"],
          'item_quantity'   =>  $_POST["quantidade"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
      }
    }
?>
