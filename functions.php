<?php

$link = new mysqli("localhost", "root", "", "bindo_nilai_siswa_v3");

session_start();

$i = 1;
$j = 1;
$tahunAjaran = date('Y') - 1 . '-' . date('Y');

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

$daftarMapel = query("SELECT * FROM mapel");
$daftarJurusan = query('SELECT * FROM jurusan');
