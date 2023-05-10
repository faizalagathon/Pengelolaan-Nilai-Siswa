<?php
include "../functions.php";
require('../assets/vendor/fpdf/fpdf.php');

class PDF extends FPDF
{
  // Better table
  function ImprovedTable($header, $data)
  {
    // Column widths
    $w = array(60, 60, 30, 40);
    // Header
    for ($i = 0; $i < count($header); $i++)
      $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
    $this->Ln();
    // Data
    foreach ($data as $row) {
      $this->Cell($w[0], 8, $row['nip'],1,0, 'C');
      $this->Cell($w[1], 8, $row['nama'],1,0, 'LR');
      $this->Cell($w[2], 8, ($row['is_walikelas'] == 1 ? 'Walikelas' : 'Guru Mapel'),1,0, 'LR');
      $this->Cell($w[3], 8, $row['password'],1,0, 'R');
      $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w), 0, '', 'T');
  }
}

$pdf = new PDF();
// Column headings
$header = array('NIP', 'NAMA', 'STATUS', 'PASSWORD');
// Data loading
$data = query("SELECT * FROM guru");
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->Cell(190,10,"DATA GURU",1,1,'C'); $pdf->Ln();
$pdf->ImprovedTable($header, $data);
$pdf->SetTitle("GURU");
$pdf->Output();
?>