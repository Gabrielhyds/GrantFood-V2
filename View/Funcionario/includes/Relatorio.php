
<?php

session_start();
$resultado = "oi";  //$_SESSION['resultado'];



require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    $this->Image('../assets/img/Logo.png',12,8,35);
    $this->Cell(40,28,utf8_decode('RELATÓRIO GERAL'),0,0,'C');
    $this->Ln(35);
    $this->cell(40,10,$_SESSION['resultado'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
    $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
    $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
    $this->cell(45,10,'Total de Vendas',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagína ').$this->PageNo().'',0,0,'C');
}
}

require_once("../../../Banco/Conexao.php");

// Lucro - Prejuízo
$sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped;"; 
$sql1 = $connection->query($sql1);
$sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g;"; $sql2 = $connection->query($sql2);
$sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
$resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
$resultado2 = number_format($resultado2, 2, ',','.');

// total de pedidos
$query="SELECT COUNT(*) AS total FROM logpedido;";
$resultado=$connection->query($query);
                   
// Total de gastos 
$sql = "SELECT sum(valor) AS total FROM gastos;"; $sql = $connection->query($sql);
$sql= $sql->fetch_assoc();
$resultado3 = $sql['total'];
$resultado3 = number_format($resultado3, 2, ',','.');

// Total de vendas
$sql = "SELECT sum(preco) AS totalVenda FROM logpedido;"; $sql = $connection->query($sql);
$sql= $sql->fetch_assoc();
$resultado4 =$sql['totalVenda'];
$resultado4 = number_format($resultado4, 2, ',','.');


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','I',9);
while ($row=$resultado->fetch_assoc()) {
	$pdf->cell(40,10,$resultado2,1,0,'C',0);
    $pdf->cell(65,10,$row['total'],1,0,'C',0);
    $pdf->cell(40,10,$resultado3,1,0,'C',0);
    $pdf->cell(45,10,$resultado4,1,0,'C',0);
}
$pdf->Output();
 ?>