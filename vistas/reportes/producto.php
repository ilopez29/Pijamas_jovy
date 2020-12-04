<?php
require_once 'conexion.php';
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(180,20,'Reporte de productos',0,0,'C');
    // Salto de línea
    $this->Ln(30);
    $this -> Image("../../img/pijamas.png",10,5,30);
    $this -> Image("../../img/pijamas.png",250,5,30);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('pagina').$this->PageNo(),0,0,'C');
}
}
// Creación del objeto de la clase heredada
$consulta ="SELECT * FROM prodagotado";
$resultado = $mysqli->query($consulta);


 


$pdf = new PDF();
$pdf->AddPage( 'lEGAL',0);
$pdf->SetFont('Arial','B',12);
while($row = $resultado->fetch_assoc()){
    $pdf ->SetFillcolor(203,212,221);
    $pdf -> Cell(90,10,utf8_decode("Id producto"),1,0,'C',true);
	$pdf -> Cell(90,10,utf8_decode("Nombre producto"),1,0,'C',true);
	$pdf -> Cell(90,10,utf8_decode("Cantidad producto"),1,1,'C',true);

    $pdf->Cell(90,10,$row['id'], 1, 0,'c', 0);
    $pdf->Cell(90,10,$row['descripcion'], 1, 0,'c', 0);
    $pdf->Cell(90,10,$row['stock'], 1, 0,'C', 0);
}

$pdf->Output();
?>
