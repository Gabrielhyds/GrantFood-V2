<div class="container">
    <div class="row" style="color: white;"> 
      <div align="center">
        <h3>Remover mesa</h5>
        <hr>
      </div>
    </div> 
</div>
<div class="container">
    <div class="row">
    <?php 
        if(isset($_GET['success'])){
          if($_GET['success'] == 'apagada'){
            ?>
              <div class="alert alert-success" role="alert">
                Mesa removida com sucesso!!!
              </div>
            <?php
          }
        }
        if(isset($_GET['erro'])){
          if($_GET['erro'] == 'naoExiste'){
            ?>
              <div class="alert alert-danger" role="alert">
                Este número de mesa não existe.
              </div>
            <?php
          } else if($_GET['erro'] == 'erroInput'){
            ?>
              <div class="alert alert-danger" role="alert">
                É necessário preencher o campo!!!
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
              <form action="../../Model/Funcionario/removerMesa.php" method="POST">
               
                    <div class="control-group">
                        <table style="position: relative; bottom: 70px;" >
                        <!--Produto-->
                        <tr>
                        <div class="input-group mb-3">
                            <td><button class="btn btn-primary" type="button" id="button-addon1" style="width: 150px; margin-top: 10px" disabled><span class="texto">Número</span></button></td>
                            <td><input type="number" class="form-control" name="removerMesa" style="position: relative; top: 5px; left: 5px; width: 420px"></td>
                        </div>
                        </tr>

                          <!--Inserir e Remover-->
                          <tr>
                            <div class="btn" >
                              <td style="position: relative;  top: 20px"><button type="submit" name="remover" class="btn btn-danger" style="font-family: arial; font-weight: bold"><i class="fa fa-trash" aria-hidden="true"></i> Remover</button>
                            </div>
                          </tr>
                        </table>
                    </div>
              </form>
        </div>
    </div>
</div>