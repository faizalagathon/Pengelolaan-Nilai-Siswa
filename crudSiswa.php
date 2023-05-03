<?php

require 'functions.php';

function tambahSiswa($data)
{
  global $link;
  $nis = htmlspecialchars($data["nis"]);
  $jk = htmlspecialchars($data["jk"]);
  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $angkatan = htmlspecialchars($data["angkatan"]);
  $jurusan = htmlspecialchars($data["kode_jurusan"]);

  //Acak nambah Password
  $passwordAcak = "S";

  $jumlahPass = 7;
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

  for ($i = 0; $i < $jumlahPass; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $passwordAcak .= $characters[$index];
  }
  //!Akhir nambah Acak Password


  //Acak Password
  $passwordAcak = "S";

  $jumlahPass = 7;
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

  for ($i = 0; $i < $jumlahPass; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $passwordAcak .= $characters[$index];
  }
  //Akhir Acak Password


  $query = "INSERT INTO siswa
                VALUES
            ('','$nis','$jk','$nama','$alamat','$passwordAcak','$angkatan','$jurusan')";

  mysqli_query($link, $query);

  return mysqli_affected_rows($link);
}

//Acak Password
if (isset($_GET['paramAksi']) && $_GET['paramAksi'] == "acakPass") {
  $passwordAcak = "S";
  $id = $_GET['id'];
  $jumlahPass = 7;
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

  for ($i = 0; $i < $jumlahPass; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $passwordAcak .= $characters[$index];
  }

  $query = "UPDATE siswa SET password='$passwordAcak' WHERE id='$id'";
  mysqli_query($link, $query);

  header("Location: beranda.php");
}
//Akhir Acak Password


function hapusSiswa($id)
{
  global $link;
  mysqli_query($link, "DELETE FROM siswa where id=$id");

  return mysqli_affected_rows($link);
}

function ubahSiswa($data)
{
  global $link;
  $id = ($data["id"]);
  $nis = htmlspecialchars($data["nis"]);
  $nama = htmlspecialchars($data["nama"]);
  $jk = htmlspecialchars($data["jk"]);
  $alamat = htmlspecialchars($data["alamat"]);



  $query = "UPDATE siswa SET 
            nis = '$nis',
            nama = '$nama',
            jk = '$jk',
            alamat = '$alamat'
           
            WHERE id=$id
            ";

  mysqli_query($link, $query);

  return mysqli_affected_rows($link);
}

function cariSiswa($keyword)
{
  $query = "SELECT * FROM siswa
                WHERE 
              nis LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              jk LIKE '%$keyword%' OR
              alamat LIKE '%$keyword%'
              ";

  return query($query);
}
