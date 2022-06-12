<?php
    //Incluindo a conexao com o banco de dados
	require_once "../../Banco/Conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>Login</title>
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
                            GRANT-FOOD
                        </div>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="../../Controller/Funcionario/logarFunc.php" class="needs-validation" novalidate="">
                                    <!--Usuário-->
                                    <div class="form-group">
                                        <label for="email">Usuário</label>
                                        <input id="usuario" type="text" class="form-control" name="usuario" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Necessario o usuário
                                        </div>
                                    </div>
                                    <!--Senha-->
                                    <div class="form-group">
                                        <label for="password" class="d-block">Senha
                                          <div class="float-right">
                                            <a href="esqueceuSenha.php">
                                              Esqueceu a senha?
                                            </a>
                                          </div>
                                        </label>
                                        <input id="senha" type="password" class="form-control" name="senha" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Necessario a senha
                                        </div>
                                    </div>

                                    <!--Permissão-->
                                    <div class="form-group">
                                        <label for="password" class="d-block">Permissão</label>
                                        <select name="permissao" id="permissao" class="form-control" tabindex="2" required>
                                          <option value="0" disabled selected>Selecione</option>
                                          <option value="1">Gerente</option>
                                          <option value="2">Garçom</option>
                                          <option value="3">Cozinha</option>
                                          <div class="invalid-feedback">
                                            Necessario a Permissão
                                        </div>
                                        </select>
                                    </div>
                                    <br>
                                    <!--Botão logar-->
                                    <div class="form-group">
                                        <button type="submit" name="btnLogar" class="btn btn-primary btn-block" tabindex="4">
                                          Logar
                                        </button>
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
    <script src="assetsLogin/js/custom.js"></script>
    <script src="assetsLogin/js/demo.js"></script>
</body>

</html>