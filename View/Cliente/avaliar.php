<div class="row text-center">
		<form method="POST" action="../../Model/Cliente/avaliarPedido.php" enctype="multipart/form-data">
			
				<div class="estrelas">
				
					<input type="radio" id="vazio" name="estrela" value="" checked>
				
					<label for="estrela_um"><i class="fa"></i></label>
					<input type="radio" id="estrela_um" name="estrela" value="1">
					
					<label for="estrela_dois"><i class="fa"></i></label>
					<input type="radio" id="estrela_dois" name="estrela" value="2">
					
					<label for="estrela_tres"><i class="fa"></i></label>
					<input type="radio" id="estrela_tres" name="estrela" value="3">
					
					<label for="estrela_quatro"><i class="fa"></i></label>
					<input type="radio" id="estrela_quatro" name="estrela" value="4">
					
						
					
					<label for="estrela_cinco"><i class="fa"></i></label>
					<input type="radio" id="estrela_cinco" name="estrela" value="5">
					
					<br><br>
					<div class="form-floating">
                    	<span for="floatingTextarea">Observação (opcional)</span>
                   		<textarea class="form-control" name="comentario" style="height: 100px" placeholder="Escreva a sua observação do pedido." id="floatingTextarea"></textarea>
                  	</div>
					  <br>
					<button type="submit" class="botao">Avaliar</button>
				</div>
						
					
					
				
			</div>
		</form>
	