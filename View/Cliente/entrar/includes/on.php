<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div align="center">
                    <?php
                        if(isset($_GET['error'])){

                            if($_GET['error'] == 'Campos'){
                                ?>
                                <h4 style="color: red;"> Você precisa encaniar o QRCode novamente</h4>
                                <?php
                            }
                          }
                        ?>
                    
                  </div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
				      	<h3 class="text-center mb-4">Entrar</h3>
					<form action="enviar.php" class="login-form" method="POST">
				      		
			            <div class="form-group d-flex">
			              <input type="number" name="mesa" hidden value="<?php echo $mesa?>">
			            </div>
			            <div class="form-group">
			            	<button type="submit" name="submit2" class="form-control btn btn-primary rounded submit px-3">Ver cardápio</button>
			            </div>
			          </form>
			        </div>
				</div>

			</div>
		</div>
	</section>