<?php
    if(!isset($_SESSION['usuario']) || $_SESSION['permissao'] == 3)
    {
      //se não houver sessão ele redireciona para tela de login
      header("Location: ../Login/index.php");
      exit;
  }

  /*if($_SESSION['permissao'] == 3)
    {
      //se não houver sessão ele redireciona para tela de login
      header("Location: ../Login/index.php");
      exit;
  }*/
?>