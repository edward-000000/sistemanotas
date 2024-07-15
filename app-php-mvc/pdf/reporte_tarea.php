<?php

require_once "../autoload.php";

use app\controllers\TareaController;

$tareaController = new TareaController();
$tareas = $tareaController->listarTarea();

# Incluyendo librerias necesarias #
require "./code128.php";

$pdf = new PDF_Code128('P', 'mm', 'Letter');
$pdf->SetMargins(17, 17, 17);
$pdf->AddPage();

/*# Logo de la empresa formato png #
$pdf->Image('./img/logo.png',165,12,35,35,'PNG');*/

# Encabezado y datos de la empresa #
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetTextColor(32, 100, 210);
$pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("REPORTE TAREAS")), 0, 0, 'L');

$pdf->Ln(9);
$pdf->Ln(9);

# Tabla de tareas #
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(23, 83, 201);
$pdf->SetDrawColor(23, 83, 201);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(20, 8, iconv("UTF-8", "ISO-8859-1", "ID"), 1, 0, 'C', true);
$pdf->Cell(45, 8, iconv("UTF-8", "ISO-8859-1", "Titulo"), 1, 0, 'C', true);
$pdf->Cell(70, 8, iconv("UTF-8", "ISO-8859-1", "Tarea"), 1, 0, 'C', true);
$pdf->Cell(45, 8, iconv("UTF-8", "ISO-8859-1", "Fecha"), 1, 0, 'C', true);
$pdf->Ln(8);
$pdf->SetTextColor(39, 39, 51);

$fill = false;
$pdf->SetFillColor(230, 230, 230); // Color de fondo claro
$pdf->SetDrawColor(180, 180, 180); // Color de borde

/*----------  Detalles de la tabla  ----------*/
foreach ($tareas as $index => $tarea) {
    $fill = $index % 2 == 0; // Alternar color de fondo
    $pdf->Cell(20, 7, iconv("UTF-8", "ISO-8859-1", $tarea['id_tarea']), 'L', 0, 'L', $fill);
    $pdf->Cell(45, 7, iconv("UTF-8", "ISO-8859-1", $tarea['titulo']), 'L', 0, 'L', $fill);
    $pdf->Cell(70, 7, iconv("UTF-8", "ISO-8859-1", $tarea['tarea']), 'L', 0, 'L', $fill);
    $pdf->Cell(45, 7, iconv("UTF-8", "ISO-8859-1", $tarea['fecha']), 'LR', 0, 'L', $fill);
    $pdf->Ln(7);
}
/*----------  Fin Detalles de la tabla  ----------*/

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(180, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Ln(12);
# Nombre del archivo PDF #
$pdf->Output("I", "Reporte_Tareas.pdf", true);
?>
