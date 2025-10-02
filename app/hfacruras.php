<?php
require 'connection.php';
require 'fpdf/fpdf.php';

// Verificar si llega el ID de la factura
if (!isset($_GET['id'])) {
    die("❌ No se especificó la factura.");
}

$invoice_id = $_GET['id'];

// Consultar datos de la factura
$sql = "SELECT i.invoice_id, v.plate, u.full_name, u.document_id, u.contact_number,
               p.entry_time, p.exit_time, i.total_time, i.amount, i.created_at
        FROM invoices i
        INNER JOIN parking p ON i.parking_id = p.parking_id
        INNER JOIN vehicles v ON p.vehicle_id = v.vehicle_id
        INNER JOIN users u ON v.user_id = u.user_id
        WHERE i.invoice_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$invoice_id]);
$invoice = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$invoice) {
    die("❌ Factura no encontrada.");
}

// Crear PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

// Encabezado
$pdf->Cell(0,10,'Factura de Parqueadero',0,1,'C');
$pdf->Ln(5);

// Datos del dueño
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Cliente:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,$invoice['full_name'],0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Documento:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,$invoice['document_id'],0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Contacto:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,$invoice['contact_number'],0,1);

$pdf->Ln(5);

// Datos del vehículo y parqueo
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Placa:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,$invoice['plate'],0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Hora Entrada:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,$invoice['entry_time'],0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Hora Salida:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,$invoice['exit_time'],0,1);

$pdf->Ln(5);

// Tiempo y valor
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Tiempo Total:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,$invoice['total_time'].' min',0,1);

$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,10,'Valor a Pagar:',0,0);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'$'.number_format($invoice['amount'], 0, ',', '.'),0,1);

$pdf->Ln(10);

// Footer
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,10,'Gracias por usar nuestro parqueadero - '.date("Y-m-d H:i"),0,0,'C');

// Salida del PDF
$pdf->Output('I', 'factura_'.$invoice['invoice_id'].'.pdf');
?>