<?php

$link = new mysqli("localhost", "root", "", "bindo_nilai_siswa_v3");

session_start();

$i = 1;
$j = 0; 
$sqlReadSiswa = "SELECT * FROM siswa";
$sqlReadNilai = "SELECT * FROM nilai 
  INNER JOIN mengajar ON nilai.id_mengajar = mengajar.id
  INNER JOIN siswa ON mengajar.nis = siswa.nis 
  WHERE nilai.id_mengajar = mengajar.id && 
  mengajar.nis = siswa.nis";
$sqlReadMapel = "SELECT * FROM mapel";

function query($sql)
{
  global $link;
  $rows = [];
  $query = $link->query($sql);
  while ($row = $query->fetch_assoc()) {
    $rows[] = $row;
  }
  return $rows;
}

$nilaiSiswa = query($sqlReadNilai);
$daftarMapel = query($sqlReadMapel);
