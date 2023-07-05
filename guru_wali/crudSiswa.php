<?php
function tambahSiswa($data)
{
  global $link;
  $nis = htmlspecialchars($data["nis"]);
  $jk = htmlspecialchars($data["jk"]);
  $nama = htmlspecialchars($data["nama"]);
  $alamat = htmlspecialchars($data["alamat"]);
  // $angkatan = htmlspecialchars($data["angkatan"]);
  // $jurusan = htmlspecialchars($data["kode_jurusan"]);
  $kelas = htmlspecialchars($data["kelas"]);

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
            ('$nis', '$kelas', '$jk', '$nama', '$alamat', '$passwordAcak')";

  mysqli_query($link, $query);

$querySiswa = "SELECT * FROM siswa WHERE nis='$nis'";

$nip = $_SESSION['nip'];
$dataGuru = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM guru WHERE nip = '$nip'"));

$id_guru = $dataGuru['id'];

// $nama_m = $_POST['nama_m'];

$dbSiswa = mysqli_query($link, $querySiswa);
$dataSiswa = [];
foreach( $dbSiswa as $data ){
    $dataSiswa[] = $data;
}

$jumlahData = count($dataSiswa);

for($i=0;$i<$jumlahData;$i++){
    $nis = $dataSiswa[$i]['nis'];

    $queryMengajar = "INSERT INTO mengajar VALUES (NULL, '$id_guru', NULL, '$nis')";
    
    mysqli_query($link, $queryMengajar);

    // $queryDataMengajar = "SELECT * FROM mengajar 
    //                         WHERE nis='$nis' 
    //                         AND id_guru='$id_guru'
    //                         AND nama_m='$nama_m'";

    // $resultMengajar = mysqli_query($link, $queryDataMengajar);
    // $dataMengajar = mysqli_fetch_assoc($resultMengajar);

    // $idMengajar = $dataMengajar['id'];
    // $tanggal = date('Y-m-d');
    
    // if($dataGuru['is_walikelas'] == 0){
    //     $queryNilai = "INSERT INTO nilai VALUES (NULL, '$idMengajar', '$tanggal', 0, 0, 0, 0)";

    //     mysqli_query($link, $queryNilai);
    // }
      // exit;
}

  return mysqli_affected_rows($link);
}

//Acak Password
if (isset($_GET['paramAksi']) && $_GET['paramAksi'] == "acakPass") {
  $passwordAcak = "S";
  $id = $_GET['nis'];
  $jumlahPass = 7;
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $link = new mysqli("localhost", "root", "", "bindo_nilai_siswa_v3");

  for ($i = 0; $i < $jumlahPass; $i++) {
    $index = rand(0, strlen($characters) - 1);
    $passwordAcak .= $characters[$index];
  }

  $query = "UPDATE siswa SET password='$passwordAcak' WHERE nis = '$id'";
  mysqli_query($link, $query);

  header("Location: beranda.php");
}
//Akhir Acak Password


function hapus($id)
{
  global $link;
  mysqli_query($link, "DELETE FROM siswa where nis=$id");

  return mysqli_affected_rows($link);
}

function ubah($data)
{
  global $link;
  $id = ($data["nis"]);
  $nama = htmlspecialchars($data["nama"]);
  $jk = htmlspecialchars($data["jk"]);
  $alamat = htmlspecialchars($data["alamat"]);



  $query = "UPDATE siswa SET 
            nama = '$nama',
            jk = '$jk',
            alamat = '$alamat'
            WHERE nis=$id
            ";

  mysqli_query($link, $query);

  return mysqli_affected_rows($link);
}

function cari($keyword)
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
