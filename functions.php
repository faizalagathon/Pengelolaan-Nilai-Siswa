<?php

$link = new mysqli("localhost", "root", "", "bindo_nilai_siswa_faizal");

$i = 1;
$sqlReadSiswa = "SELECT * FROM siswa";
$sqlReadNilai = "SELECT * FROM nilai 
  INNER JOIN mengajar ON nilai.id_mengajar = mengajar.id
  INNER JOIN siswa ON mengajar.id_siswa = siswa.id 
  WHERE nilai.id_mengajar = mengajar.id && 
  mengajar.id_siswa = siswa.id";

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
