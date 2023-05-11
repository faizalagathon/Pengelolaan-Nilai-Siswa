<?php

$link = mysqli_connect("localhost", "root", "", "bindo_nilai_siswa_v3");

$i = 1;
$j = 1;
$tahunAjaran = date('Y') - 1 . '-' . date('Y');

session_start();
function query($sql)
{
  global $link;
  $rows = [];
  $query = mysqli_query($link,$sql);
  while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
  }
  return $rows;
}



$daftarMapel = query("SELECT * FROM mapel");
$daftarJurusan = query('SELECT * FROM jurusan');
