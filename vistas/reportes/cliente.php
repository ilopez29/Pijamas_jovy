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
    $this->Cell(210,20,'Reporte de clientes',0,0,'C');
    // Salto de línea
    $this->Ln(30);
    $this -> Image("../../img/pijamas.png",10,5,30);
    $this -> Image("../../img/pijamas.png",310,5,30);
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
$consulta ="SELECT * FROM cliente";
$resultado = $mysqli->query($consulta);


 


$pdf = new PDF();
$pdf->AddPage('LANDSCAPE', 'lEGAL',0);
$pdf->SetFont('Arial','B',12);
while($row = $resultado->fetch_assoc()){
    $pdf ->SetFillcolor(203,212,221);
	$pdf -> Cell(40,10,utf8_decode("Nombre"),1,0,'C',true);
	$pdf -> Cell(50,10,utf8_decode("Apellido"),1,0,'C',true);
    $pdf -> Cell(40,10,utf8_decode("Documento"),1,0,'C',true);
    $pdf -> Cell(40,10,utf8_decode("Telefono"),1,0,'C',true);
    $pdf -> Cell(100,10,utf8_decode("Correo electronico"),1,0,'C',true);
    $pdf -> Cell(65,10,utf8_decode("Dirección"),1,1,'C',true);

    $pdf->Cell(40,10,$row['Nombres_cliente'], 1, 0,'c', 0);
    $pdf->Cell(50,10,$row['Apellidos_cliente'], 1, 0,'C', 0);
    $pdf->Cell(40,10,$row['Documento_cliente'], 1, 0,'C', 0);
    $pdf->Cell(40,10,$row['Telefono_cliente'], 1, 0,'C', 0);
    $pdf->Cell(100,10,$row['Correo_cliente'], 1, 0,'C', 0);
    $pdf->Cell(65,10,$row['Direccion_cliente'], 1, 1,'C', 0);
}

$pdf->Output();
?>
