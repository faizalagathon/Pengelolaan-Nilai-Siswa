<?php
include "../functions.php";
require('../assets/vendor/fpdf/fpdf.php');

$tahunSemester1 = explode('-', $tahunAjaran)[0];
$bulanPertamaSemester1 = '07';
$bulanAkhirSemester1 = '12';
$semester1Awal = $tahunSemester1 . '-' . $bulanPertamaSemester1 . '-01';
$semester1Akhir = $tahunSemester1 . '-' . $bulanAkhirSemester1 . '-30';

$tahunSemester2 = explode('-', $tahunAjaran)[1];
$bulanPertamaSemester2 = '01';
$bulanAkhirSemester2 = '06';
$semester2Awal = $tahunSemester2 . '-' . $bulanPertamaSemester2 . '-01';
$semester2Akhir = $tahunSemester2 . '-' . $bulanAkhirSemester2 . '-30';

class PDF extends FPDF
{
  // Better table
  function ImprovedTable($header, $data1)
  {
    // Column widths
    $w = array(110, 20, 20, 20, 20);
    // Header
    for ($i = 0; $i < count($header); $i++) {
      $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
    }
    $this->Ln();
    // Data
    foreach ($data1 as $row) {
      $this->Cell($w[0], 8, $row['nama_m'], 1, 0, 'C');
      $this->Cell($w[1], 8, $row['uh'], 1, 0, 'C');
      $this->Cell($w[2], 8, $row['uts'], 1, 0, 'C');
      $this->Cell($w[3], 8, $row['uas'], 1, 0, 'C');
      $this->Cell($w[4], 8, $row['na'], 1, 0, 'C');
      $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w), 0, '', 'T');
    $this->AddPage();
  }
}

$pdf = new PDF();
// Column headings
$header = array('MAPEL', 'UH', 'UTS', 'UAS', 'NA');
// Data loading
$data = query("SELECT *,
siswa.nama AS nama_s
FROM siswa
INNER JOIN kelas ON siswa.id_kelas = kelas.id 
INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
INNER JOIN mengajar ON siswa.nis = mengajar.nis
INNER JOIN guru ON mengajar.id_guru = guru.id
INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
WHERE mengajar.nis = $_SESSION[nis]");
$dataSemester1 = query("SELECT *,
siswa.nama AS nama_s
FROM siswa
INNER JOIN kelas ON siswa.id_kelas = kelas.id 
INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
INNER JOIN mengajar ON siswa.nis = mengajar.nis
INNER JOIN guru ON mengajar.id_guru = guru.id
INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
WHERE mengajar.nis = $_SESSION[nis] AND nilai.tanggal BETWEEN '$semester1Awal' AND '$semester1Akhir'");
$dataSemester2 = query("SELECT *,
siswa.nama AS nama_s
FROM siswa
INNER JOIN kelas ON siswa.id_kelas = kelas.id 
INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
INNER JOIN mengajar ON siswa.nis = mengajar.nis
INNER JOIN guru ON mengajar.id_guru = guru.id
INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
WHERE mengajar.nis = $_SESSION[nis] AND nilai.tanggal BETWEEN '$semester2Awal' AND '$semester2Akhir'");
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->Cell(190, 10, "DATA NILAI" . ' ' . $data[0]['angkatan'] . ' ' . explode('-', $data[0]['kode_jurusan'])[0] . ' ' . explode('-', $data[0]['kode_jurusan'])[1], 1, 1, 'C');
$pdf->Cell(190, 10, $data[0]['nis'] . ' : ' . $data[0]['nama_s'], 1, 1, 'C');
$pdf->Ln();

$pdf->Cell(190, 8, 'SEMESTER 1', 1, 1, 'C');
$pdf->Ln();

$pdf->ImprovedTable($header, $dataSemester1);

$pdf->Cell(190, 8, 'SEMESTER 2', 1, 1, 'C');
$pdf->Ln();

$pdf->ImprovedTable($header, $dataSemester2);

$pdf->SetTitle("NILAI SISWA " . $data[0]['angkatan'] . '_' . explode('-', $data[0]['kode_jurusan'])[0] . '_' . explode('-', $data[0]['kode_jurusan'])[1]);

$pdf->Output();
