<?php

include "connection.php";

$data = query("SELECT 
*, 
siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
jurusan.nama AS nama_j,
guru.nama AS nama_g, guru.alamat AS alamat_g
FROM siswa 
INNER JOIN kelas ON siswa.id_kelas = kelas.id 
INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
INNER JOIN mengajar ON siswa.nis = mengajar.nis
INNER JOIN guru ON mengajar.id_guru = guru.id
WHERE guru.is_walikelas = 1 AND guru.nip = $_SESSION[nip]");
    
ob_end_clean();
require('fpdf/fpdf.php');
  
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 12);

// Prints a cell with given text 
$pdf->Header();
$pdf->Cell(0,10,"DAFTAR PENGGUNA",1,1,"C");
$pdf->Ln();
// $pdf->Cell(50,10,"EMAIL PENGGUNA",1,0,"L");
$pdf->Cell(0,1,"",1,1,"R");
foreach ($data as $dt) {
  $pdf->Cell(85,10,"USERNAME PENGGUNA : ",0,0,"L");
  $pdf->Cell(0,10,$dt['username_pengguna'],0,0,"R");
  $pdf->Ln();
  $pdf->Cell(70,10,"NAMA PENGGUNA : ",0,0,"L");
  $pdf->Cell(0,10,$dt['nama_pengguna'],0,0,"R");
  $pdf->Ln();
  $pdf->Cell(70,10,"EMAIL PENGGUNA : ",0,0,"L");
  $pdf->Cell(0,10,$dt['email_pengguna'],0,0,"R");
  $pdf->Ln();
  $pdf->Cell(75,10,"KONTAK PENGGUNA : ",0,0,"L");
  $pdf->Cell(0,10,$dt['kontak_pengguna'],0,0,"R");
  $pdf->Ln();
  $pdf->Cell(0,1,"",1,0,"R");
  $pdf->Ln();
  $pdf->Ln();
}
  
// return the generated output
$pdf->Output();
  
?>