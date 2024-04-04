<?php 
require(root.'fpdf/plantilla.php');
use modelo\UsuariosModelo as Usuarios;
if (isset($_POST['generar_pdf'])) {
    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(25,25,25);
    $pdf->AddPage();
    $usuario = new Usuarios();
    $usuarios = $usuario->listar();
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(100,5, 'Nombre', 1, 0, 'C');
    $pdf->Cell(70,5, 'Correo', 1, 1, 'C');
    
    $pdf->SetFont('Arial','',9);
    foreach ($usuarios as $usuario) {
        $pdf->Cell(100,5, $usuario['nombre'], 1, 0);
        $pdf->Cell(70,5, $usuario['correo'], 1, 1);
    }

    // Salida del PDF
    $pdf->Output();
    exit();
}
?>