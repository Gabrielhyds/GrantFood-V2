<?php
// Conexao com o banco de dados:
include_once("../../Banco/Conexao.php");

//Iniciar a sessao
session_start();

//Limpar o buffer de saida
 ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>Alterar Senha</title>
    <link rel="icon" type="image/x-icon" href="assetsLogin/img/favicon.jpg">
    <link rel="stylesheet" href="assetsLogin/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetsLogin/modules/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assetsLogin/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="assetsLogin/css/demo.css">
    <link rel="stylesheet" href="assetsLogin/css/style.css">
</head>
<body>
	<!--Se os dados estiverem incorretos retorna um ?erro na URL-->
	<?php
        if(isset($_GET['erro'])){
            echo $_GET['erro'];
        }
	?>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            Grant-Food
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Alterar Senha</h4>
                            </div>

                            <div class="card-body">
                                <p class="text-muted" style="color:black">Digite a nova senha</p>
                                <form method="POST">
									<!--Senha-->
                                    <div class="form-group">
                                        <label for="senha" style="color:black">Senha</label>
                                        <input id="senha" type="password" class="form-control" name="senha" tabindex="1" required autofocus>
                                    </div>

									<!--Confirma Senha-->
                                    <div class="form-group">
                                        <label for="ConfirmaSenha" style="color:black">Confirmar Senha</label>
                                        <input id="ConfirmaSenha" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="ConfirmaSenha" tabindex="2" required>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>

									<!--Botão redefinir senha-->
                                    <div class="form-group">
                                        <button type="submit" name="btnNovaSenha" class="btn btn-primary btn-block" tabindex="4">
											Redefinir Senha
										</button>
                                    </div>
									<div class="form-group">
										<?php
											//Verifica se o botão foi precionado
											if(isset($_POST['btnNovaSenha'])){
													$senha = md5($_POST['senha']);
													$confirmaSenha = md5($_POST['ConfirmaSenha']);
													// verifica se as senhas são iguais
													if($senha == $confirmaSenha){
														$sessionUsuario = $_SESSION['usuario'];
														//transforma a sessão usuario em uma variavel $usuario
														$usuario = mysqli_real_escape_string($connection,$sessionUsuario);
														//query que faz a alteração do campo senha do usuário especifico
														$sql = "UPDATE usuario SET senha ='$senha' WHERE usuario= '".$usuario."'";
														if (mysqli_query($connection, $sql)) {
															//se retornar true a senha é modificada no banco
															echo "<script>window.alert('senha alterada com sucesso');window.location.href='index.php';</script>";
														} else {
															//se não exibe até o momento um alert de erro
															echo "<script>window.alert('Erro ao atualizar a senha');window.location.href='recuperarSenha.php?erro';</script>";
														}
													}else{
														echo "<script>window.alert('Senhas diferentes');window.location.href='recuperarSenha.php?erro';</script>";
													}
											}					
										?>
                					</div>
                                </form>
                            </div>
                        </div>
						<div class="simple-footer">
                            COPYRIGHT &copy; GRANTFOOD 2022
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="assetsLogin/modules/jquery.min.js"></script>
    <script src="assetsLogin/modules/popper.js"></script>
    <script src="assetsLogin/modules/tooltip.js"></script>
    <script src="assetsLogin/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assetsLogin/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assetsLogin/modules/moment.min.js"></script>
    <script src="assetsLogin/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
    <script src="assetsLogin/js/sa-functions.js"></script>

    <script src="assetsLogin/js/scripts.js"></script>
</body>

</html>