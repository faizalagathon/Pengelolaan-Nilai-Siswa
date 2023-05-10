<?php
include "../functions.php";
require('../assets/vendor/fpdf/fpdf.php');

class PDF extends FPDF
{
  // Better table
  function ImprovedTable($header, $data)
  {
    // Column widths
    $w = array(35, 80, 75);
    // Header
    for ($i = 0; $i < count($header); $i++)
      $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
    $this->Ln();
    // Data
    foreach ($data as $row) {
      $this->Cell($w[0], 8, $row['nis'],1,0, 'C');
      $this->Cell($w[1], 8, $row['nama_s'],1,0, 'LR');
      $this->Cell($w[2], 8, $row['pass_s'],1,0, 'R');
      $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w), 0, '', 'T');
  }
}

$pdf = new PDF();
// Column headings
$header = array('NIS', 'NAMA', 'PASSWORD');
// Data loading
$data = query("SELECT 
*, 
siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s, siswa.password AS pass_s,
jurusan.nama AS nama_j,
guru.nama AS nama_g, guru.alamat AS alamat_g
FROM siswa 
INNER JOIN kelas ON siswa.id_kelas = kelas.id 
INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
INNER JOIN mengajar ON siswa.nis = mengajar.nis
INNER JOIN guru ON mengajar.id_guru = guru.id
WHERE guru.is_walikelas = 1 AND guru.nip = $_SESSION[nip] AND mengajar.nama_m IS NULL
GROUP BY siswa.nis");
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->Cell(190,10,"DATA SISWA " . $data[0]['angkatan'] . ' ' . explode('-',$data[0]['kode_jurusan'])[0] . ' ' . explode('-',$data[0]['kode_jurusan'])[1],1,1,'C'); $pdf->Ln();
$pdf->ImprovedTable($header, $data);
$pdf->SetTitle("SISWA_" . $data[0]['angkatan'] . '_' . explode('-',$data[0]['kode_jurusan'])[0] . '_' . explode('-',$data[0]['kode_jurusan'])[1]);
$pdf->PageNo();
$pdf->Output();
?>