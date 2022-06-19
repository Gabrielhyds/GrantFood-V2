<?php
	//incluindo a conexao com o banco de dados
	require_once "../../Banco/Conexao.php";

	//inciando a sessão
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>Esqueceu Senha</title>
    <link rel="icon" type="image/x-icon" href="assetsLogin/img/favicon.jpg">
    <link rel="stylesheet" href="assetsLogin/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assetsLogin/modules/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="assetsLogin/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">

    <link rel="stylesheet" href="assetsLogin/css/demo.css">
    <link rel="stylesheet" href="assetsLogin/css/style.css">
</head>
<body>
	<!--se os dados estiverem errado retorna um ?erro na URL-->
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
                                <h4>Esqueceu a senha</h4>
                            </div>

                            <div class="card-body">
                                <p class="text-muted" style="color:black">Para recuperar a senha informe os dados abaixo</p>
                                <form method="POST">
									<!--USUÁRIO-->
                                    <div class="form-group">
                                        <label for="usuario" style="color:black">Usuário</label>
                                        <input id="usuario" type="text" class="form-control" name="usuario" tabindex="1" required autofocus>
                                    </div>

									<!--CPF-->
									<div class="form-group">
                                        <label for="cpf" style="color:black">CPF</label>
                                        <input id="cpf" type="number" class="form-control" name="cpf" tabindex="1" required autofocus>
                                    </div>

									<!--BOTÃO-->
                                    <div class="form-group">
                                        <button type="submit" name="btnRecuperar" class="btn btn-primary btn-block" tabindex="4">
											Validar dados
										</button>
                                    </div>
									<div class="text-center">
									<?php
										//verifica se o botão foi pressionado
										if(isset($_POST['btnRecuperar'])){
											$usuario = $_POST['usuario'];
											$cpf = $_POST['cpf'];
											$_SESSION['usuario'] = $_POST['usuario'];
											$_SESSION['cpf'] = $_POST['cpf'];
											// query que seleciona o usuário em especifico
											$sql = $connection->query("SELECT * FROM usuario WHERE usuario = '$usuario' && cpf = '$cpf'");	
											if($row=$sql->fetch_assoc()){
												//se o usuário existir leva o mesmo até a pagina recuperarSenha.php
												header("Location:recuperarSenha.php");
											}else{
												//se der erro o usuario até o momento recebe na tela para tentar novamente
												echo "<script>window.alert('Dados incorretos tente novamente!');window.location.href='esqueceuSenha.php?erro';</script>";
											}
														
											}
									?>
									</div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            COPYRIGHT &copy; GRANT-FOOD
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