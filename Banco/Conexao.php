<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "grantFood123";
try{
    $connPDO = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    $connection = mysqli_connect($host, $user, $pass, $dbname);
    //echo "Conexão com banco de dados realizado com sucesso!";
}  catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}