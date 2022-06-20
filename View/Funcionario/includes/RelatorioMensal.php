<?php

session_start();
require('fpdf.php');

class PDF extends FPDF
{
    
// Cabecera de página
function Header()
{
    $mes = $_SESSION['mes'];
    switch($mes){
        case 1:
              // Arial bold 15
              $this->SetFont('Arial','B',12);
              // Movernos a la derecha
              $this->Cell(80);
              $this->Image('../assets/img/Logo.png',12,8,35);
              $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Janeiro "),0,0,'C');
              $this->Ln(35);
              $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
              $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
              $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
              $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break;
        case 2: 
              // Arial bold 15
              $this->SetFont('Arial','B',12);
              // Movernos a la derecha
              $this->Cell(80);
              $this->Image('../assets/img/Logo.png',12,8,35);
              $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Fevereiro "),0,0,'C');
              $this->Ln(35);
              $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
              $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
              $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
              $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 3: 
             // Arial bold 15
             $this->SetFont('Arial','B',12);
             // Movernos a la derecha
             $this->Cell(80);
             $this->Image('../assets/img/Logo.png',12,8,35);
             $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Março "),0,0,'C');
             $this->Ln(35);
             $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
             $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
             $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
             $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break;
        case 4: 
             // Arial bold 15
             $this->SetFont('Arial','B',12);
             // Movernos a la derecha
             $this->Cell(80);
             $this->Image('../assets/img/Logo.png',12,8,35);
             $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Abril "),0,0,'C');
             $this->Ln(35);
             $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
             $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
             $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
             $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 5: 
              // Arial bold 15
              $this->SetFont('Arial','B',12);
              // Movernos a la derecha
              $this->Cell(80);
              $this->Image('../assets/img/Logo.png',12,8,35);
              $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Maio "),0,0,'C');
              $this->Ln(35);
              $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
              $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
              $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
              $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 6: 
              // Arial bold 15
              $this->SetFont('Arial','B',12);
              // Movernos a la derecha
              $this->Cell(80);
              $this->Image('../assets/img/Logo.png',12,8,35);
              $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Junho "),0,0,'C');
              $this->Ln(35);
              $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
              $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
              $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
              $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 7: 
             // Arial bold 15
             $this->SetFont('Arial','B',12);
             // Movernos a la derecha
             $this->Cell(80);
             $this->Image('../assets/img/Logo.png',12,8,35);
             $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Julho "),0,0,'C');
             $this->Ln(35);
             $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
             $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
             $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
             $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 8: 
             // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            $this->Cell(80);
            $this->Image('../assets/img/Logo.png',12,8,35);
            $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Agosto "),0,0,'C');
            $this->Ln(35);
            $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
            $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
            $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
            $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 9: 
              // Arial bold 15
              $this->SetFont('Arial','B',12);
              // Movernos a la derecha
              $this->Cell(80);
              $this->Image('../assets/img/Logo.png',12,8,35);
              $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Setembro "),0,0,'C');
              $this->Ln(35);
              $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
              $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
              $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
              $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 10: 
             // Arial bold 15
             $this->SetFont('Arial','B',12);
             // Movernos a la derecha
             $this->Cell(80);
             $this->Image('../assets/img/Logo.png',12,8,35);
             $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Outubro "),0,0,'C');
             $this->Ln(35);
             $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
             $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
             $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
             $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 11: 
              // Arial bold 15
              $this->SetFont('Arial','B',12);
              // Movernos a la derecha
              $this->Cell(80);
              $this->Image('../assets/img/Logo.png',12,8,35);
              $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Novembro "),0,0,'C');
              $this->Ln(35);
              $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
              $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
              $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
              $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 
        case 12: 
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            $this->Cell(80);
            $this->Image('../assets/img/Logo.png',12,8,35);
            $this->Cell(40,28,utf8_decode("RELATÓRIO MENSAL REFERÊNTE AO MÊS: Dezembro "),0,0,'C');
            $this->Ln(35);
            $this->cell(40,10,$_SESSION['resultado2'] > 0 ? "LUCRO": "PREJUIZO",1,0,'C',0);
            $this->cell(65,10,'Total de Pedidos',1,0,'C',0);
            $this->cell(40,10,utf8_decode('Total de Gastos'),1,0,'C',0);
            $this->cell(45,10,'Total de Vendas',1,1,'C',0);
            break; 

    }
    
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

$mes = $_SESSION['mes'];
switch($mes){
    case 1:
       
    // Lucro - Prejuízo
    $ano = date('Y');
    $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 01;"; 
    $sql1 = $connection->query($sql1);
    $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 01;"; $sql2 = $connection->query($sql2);
    $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
    $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
    $resultado2 = number_format($resultado2, 2, ',','.');
    

    // total de pedidos
    $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 01;";
    $resultado=$connection->query($query);
                    
    // Total de gastos 
    $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 01;"; $sql = $connection->query($sql);
    $sql= $sql->fetch_assoc();
    $resultado3 = $sql['total'];
    $resultado3 = number_format($resultado3, 2, ',','.');

    // Total de vendas
    $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 01;"; $sql = $connection->query($sql);
    $sql= $sql->fetch_assoc();
    $resultado4 =$sql['totalVenda'];
    $resultado4 = number_format($resultado4, 2, ',','.');
    $_SESSION['resultado2'] = $resultado2;

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
    break;
    case 2:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 02;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 02;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');
    
        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 02;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 02;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');
    
        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 02;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;
    
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
        break;
    case 3:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 03;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 03;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');
    
        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 03;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 03;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');
    
        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 03;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;
    
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
            break;
    case 4:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 04;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 04;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');
    
        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 04;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 04;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');
    
        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 04;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;
    
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
        break;    
    case 5:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 05;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 05;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');

        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 05;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 05;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');

        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido wHERE MONTH(data) = 05;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;

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
        break;
    case 6:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) AS logpedido FROM logpedido AS logped where year(DATA) = '$ano' and month(DATA) = 6;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g wHERE year(DATA) = '$ano' AND MONTH(data) = 06;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');

        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido WHERE year(DATA) = '$ano' AND MONTH(data) = 06;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos WHERE year(DATA) = '$ano' AND MONTH(data) = 06;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');

        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido WHERE year(DATA) = '$ano' AND MONTH(data) = 06;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;

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
        break;
    case 7:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 07;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 07;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');

        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 07;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 07;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');

        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 07;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;

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
        break;
    case 8:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 07;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 07;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');

        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 08;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 08;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');

        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 08;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;

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
        break;
    case 9:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 09;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 09;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');

        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 09;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 09;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');

        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 09;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;

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
        break;
    case 10:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 10;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 10;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');

        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 10;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 10"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');

        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 10;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;

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
        break;
    case 11:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 11;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 11;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');

        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 11;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 11;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');

        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 11;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;

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
        break;
    case 12:
        // Lucro - Prejuízo
        $ano = date('Y');
        $sql1 = "SELECT SUM(logped.preco) as logpedido FROM logpedido AS logped where year(DATA) = '$ano' and MONTH(data) = 12;"; 
        $sql1 = $connection->query($sql1);
        $sql2 = "SELECT SUM(g.valor) as valorGasto FROM gastos AS g where year(DATA) = '$ano' and MONTH(data) = 12;"; $sql2 = $connection->query($sql2);
        $sql1= $sql1->fetch_assoc();$sql2= $sql2->fetch_assoc();
        $resultado2 = $sql1['logpedido'] - $sql2['valorGasto'];
        $resultado2 = number_format($resultado2, 2, ',','.');

        // total de pedidos
        $query="SELECT COUNT(*) AS total FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 12;";
        $resultado=$connection->query($query);
                        
        // Total de gastos 
        $sql = "SELECT sum(valor) AS total FROM gastos where year(DATA) = '$ano' and MONTH(data) = 12;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado3 = $sql['total'];
        $resultado3 = number_format($resultado3, 2, ',','.');

        // Total de vendas
        $sql = "SELECT sum(preco) AS totalVenda FROM logpedido where year(DATA) = '$ano' and MONTH(data) = 12;"; $sql = $connection->query($sql);
        $sql= $sql->fetch_assoc();
        $resultado4 =$sql['totalVenda'];
        $resultado4 = number_format($resultado4, 2, ',','.');
        $_SESSION['resultado2'] = $resultado2;

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
        break;
        
}
 ?>