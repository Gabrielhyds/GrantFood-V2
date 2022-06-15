<?php 
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
    $this->Image('../assets/img/Fundo.jpg',82,2,40);
    // Salto de línea
    $this->Ln(30);
    $this->Cell(190,10,utf8_decode('total de vendas'),0,0,'C');
    $this->Ln(20);
    $this->cell(25,10,'Id',1,0,'C',0);
    $this->cell(40,10,'Nome',1,0,'C',0);
    $this->cell(40,10,utf8_decode('Usuário'),1,0,'C',0);
    $this->cell(40,10,utf8_decode('Salário'),1,0,'C',0);
    $this->cell(40,10,utf8_decode('Permissão'),1,1,'C',0);
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
$query="SELECT SUM(preco) AS totalVendas FROM logpedido wHERE data BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE();";
$resultado = $connection->query($query);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','I',9);
while ($row=$resultado->fetch_assoc()) {
	$pdf->cell(25,10,$row['preco'],1,0,'C',0);
}
$pdf->Output();
 ?>