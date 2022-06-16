<div class="container">
    <div class="row" style="color: black;"> 
      <div class="col-md-12 text-center">
        <h3>Adicionar mesa</h5>
        <hr>
      </div>
    </div> 
</div>
<div class="container">
    <div class="row">
    <?php 
        if(isset($_GET['erro'])){
          if($_GET['erro'] == 'jaExiste'){
            ?>
              <div class="alert alert-danger" role="alert">
                Este número de mesa já existe.
              </div>
            <?php
          }
        }
        ?>
    </div>
</div>
<div class="container"> 
    <div class="row">
        <div style="width: 650px; margin-left: 20%; margin-top: 50px;">
              <form action="../../Model/Funcionario/criarMesa.php" method="POST">
               
                    <div class="control-group">
                        <table style="position: relative; bottom: 70px;" >
                        <!--Produto-->
                        <tr>
                          <div class="input-group mb-3">
                              <td><button class="btn btn-primary" type="button" id="button-addon1" style="width: 150px; margin-top: 10px" disabled><span class="texto">Número</span></button></td>
                              <td><input type="number" class="form-control" name="novaMesa" style="position: relative; top: 5px; left: 5px; width: 420px"></td>
                          </div>
                        </tr>
                        <tr>
                          <div class="input-group mb-3">
                              <td><button class="btn btn-info" type="button" id="button-addon1" style="width: 150px; margin-top: 10px" disabled><span class="texto">Lugares</span></button></td>
                              <td><input type="number" class="form-control" name="lugares" style="position: relative; top: 5px; left: 5px; width: 420px"></td>
                          </div>
                        </tr>

                          <!--Inserir e Remover-->
                          <tr>
                            <div class="row">
                              <div class="col-md-12 text-center">
                                <td style="position: relative;  top: 20px">
                                  <button type="submit" name="criar" class="btn btn-success" style="font-family: arial; font-weight: bold"><span class="fa fa-plus mr-1"></span>Adicionar</button>
                                </td>
                              </div>
                            </div>
                            
                          </tr>
                        </table>
                    </div>
              </form>
        </div>
    </div>
</div>