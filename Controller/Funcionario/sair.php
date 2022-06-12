<?php
   session_start();
   unset($_SESSION['usuario'], $_SESSION['senha'], $_SESSION['permissao']);

   header("location:../../view/login/index.php"); 
?>