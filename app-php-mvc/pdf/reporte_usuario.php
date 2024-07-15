<?php
require_once "../autoload.php";

use app\controllers\UsuarioController;
$usuarioController = new UsuarioController();
$usuarios = $usuarioController->listarUsuario();

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
$pdf->Cell(150, 10, iconv("UTF-8", "ISO-8859-1", strtoupper("REPORTE USUARIOS")), 0, 0, 'L');

$pdf->Ln(9);
$pdf->Ln(9);

# Tabla de usuarios #
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(23, 83, 201);
$pdf->SetDrawColor(23, 83, 201);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(20, 8, iconv("UTF-8", "ISO-8859-1", "ID"), 1, 0, 'C', true);
$pdf->Cell(35, 8, iconv("UTF-8", "ISO-8859-1", "Nombre"), 1, 0, 'C', true);
$pdf->Cell(35, 8, iconv("UTF-8", "ISO-8859-1", "Apellidos"), 1, 0, 'C', true);
$pdf->Cell(45, 8, iconv("UTF-8", "ISO-8859-1", "Usuario"), 1, 0, 'C', true);
$pdf->Cell(55, 8, iconv("UTF-8", "ISO-8859-1", "Email"), 1, 0, 'C', true);
$pdf->Ln(8);
$pdf->SetTextColor(39, 39, 51);

$fill = false;
$pdf->SetFillColor(230, 230, 230); // Color de fondo claro
$pdf->SetDrawColor(180, 180, 180); // Color de borde

/*----------  Detalles de la tabla  ----------*/
foreach ($usuarios as $index => $usuario) {
    $fill = $index % 2 == 0; // Alternar color de fondo
    $pdf->Cell(20, 7, iconv("UTF-8", "ISO-8859-1", $usuario['id_usuario']), 'L', 0, 'L', $fill);
    $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", $usuario['nombre']), 'L', 0, 'L', $fill);
    $pdf->Cell(35, 7, iconv("UTF-8", "ISO-8859-1", $usuario['apellido']), 'L', 0, 'L', $fill);
    $pdf->Cell(45, 7, iconv("UTF-8", "ISO-8859-1", $usuario['usuario']), 'L', 0, 'L', $fill);
    $pdf->Cell(55, 7, iconv("UTF-8", "ISO-8859-1", $usuario['email']), 'LR', 0, 'L', $fill);
    $pdf->Ln(7);
}
/*----------  Fin Detalles de la tabla  ----------*/

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(180, 7, iconv("UTF-8", "ISO-8859-1", ''), 'T', 0, 'C');
$pdf->Ln(12);
# Nombre del archivo PDF #
$pdf->Output("I", "Reporte_Usuarios.pdf", true);
