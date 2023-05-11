<?php

if (
  isset($_SESSION['nip']) &&
  (array_slice(explode('/', $_SERVER['REQUEST_URI']), -2, 1)[0] == 'guru_mapel' ||
    array_slice(explode('/', $_SERVER['REQUEST_URI']), -2, 1)[0] == 'guru_wali' || 
    explode('?',basename($_SERVER['REQUEST_URI']))[0] == 'crudNilai.php'
  )
) {

  $idGuru = query("SELECT id FROM guru WHERE nip = $_SESSION[nip]")[0]['id'];

  // SECTION HAPUS DAN EDIT NILAI
  if (isset($_GET["hapusNilai"])) {
    $idNilai = $_POST["idNilai"];

    $sqlHapusNilai = "UPDATE nilai 
    SET 
    uh = 0,
    uts = 0,
    uas = 0,
    na = 0
    WHERE id = $idNilai";
    $queryHapusNilai = mysqli_query($link, $sqlHapusNilai);

    if (mysqli_affected_rows($link) === 1) {
      header("Location: beranda.php?tHapus");
    } else {
      header("Location: beranda.php?fHapus");
    }
  }
  if (isset($_GET["editNilai"])) {
    $idNilai = $_GET["idNilai"];

    $sqlEditNilai = "UPDATE nilai 
    SET 
    uh = $_GET[uh],
    uts = $_GET[uts],
    uas = $_GET[uas],
    na = $_GET[na]
    WHERE id = $idNilai";
    $queryEditNilai = mysqli_query($link, $sqlEditNilai);

    if (mysqli_affected_rows($link) == 1) {
      header("Location: beranda.php?tEdit");
    } else {
      header("Location: beranda.php?fEdit");
    }
  }
  // !SECTION HAPUS DAN EDIT NILAI

  if (
    isset($_GET['tEdit']) || 
    isset($_GET['fEdit']) || 
    isset($_GET['editNilai'])
  ){
    $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON  mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru";
  }

  // SECTION PENGKATEGORIAN DEFAULT
  if (
    isset($_GET['angkatan']) && $_GET['angkatan'] == '' &&
    isset($_GET['jurusan']) && $_GET['jurusan'] == '' &&
    isset($_GET['semester']) && $_GET['semester'] == '' &&
    !isset($_GET['cariNilai'])
  ) {
    $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru";
  }
  if (
    !isset($_GET['angkatan']) &&
    !isset($_GET['jurusan']) &&
    !isset($_GET['semester']) &&
    !isset($_GET['cariNilai'])
  ) {
    $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE mengajar.id_guru = $idGuru";
  }
  // !SECTION PENGKATEGORIAN DEFAULT

  // SECTION PENGKATEGORIAN TANPA PENCARIAN 
  if (
    isset($_GET['angkatan']) &&
    isset($_GET['jurusan']) &&
    isset($_GET['semester']) &&
    !isset($_GET['cariNilai'])
  ) {
    if ($_GET['semester'] == '1') {
      $bulanPertama = '07';
      $bulanAkhir = '12';
      $tahunSemester1 = explode('-', $tahunAjaran)[0];
      $semester1Awal = $tahunSemester1 . '-' . $bulanPertama . '-01';
      $semester1Akhir = $tahunSemester1 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru && 
      kelas.angkatan = '$_GET[angkatan]' &&
      kelas.kode_jurusan = '$_GET[jurusan]' &&
      nilai.tanggal BETWEEN '$semester1Awal' AND '$semester1Akhir'";
    }
    if ($_GET['semester'] == '2') {
      $tahunSemester2 = explode('-', $tahunAjaran)[1];
      $bulanPertama = '01';
      $bulanAkhir = '06';
      $semester2Awal = $tahunSemester2 . '-' . $bulanPertama . '-01';
      $semester2Akhir = $tahunSemester2 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru && 
      kelas.angkatan = '$_GET[angkatan]' &&
      kelas.kode_jurusan = '$_GET[jurusan]' &&
      nilai.tanggal BETWEEN '$semester2Awal' AND '$semester2Akhir'";
    }
  }
  // !SECTION PENGKATEGORIAN TANPA PENCARIAN 

  // SECTION SEMESTER TANPA PENCARIAN & KATEGORI
  if (
    !isset($_GET['angkatan']) &&
    !isset($_GET['jurusan']) &&
    isset($_GET['semester']) &&
    !isset($_GET['cariNilai'])
  ) {
    if ($_GET['semester'] == '1') {
      $bulanPertama = '07';
      $bulanAkhir = '12';
      $tahunSemester1 = explode('-', $tahunAjaran)[0];
      $semester1Awal = $tahunSemester1 . '-' . $bulanPertama . '-01';
      $semester1Akhir = $tahunSemester1 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru && 
      nilai.tanggal BETWEEN '$semester1Awal' AND '$semester1Akhir'";
    }
    if ($_GET['semester'] == '2') {
      $tahunSemester2 = explode('-', $tahunAjaran)[1];
      $bulanPertama = '01';
      $bulanAkhir = '06';
      $semester2Awal = $tahunSemester2 . '-' . $bulanPertama . '-01';
      $semester2Akhir = $tahunSemester2 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru && 
      nilai.tanggal BETWEEN '$semester2Awal' AND '$semester2Akhir'";
    }
  }
  // !SECTION SEMESTER TANPA PENCARIAN & KATEGORI 

  // SECTION PENGKATEGORIAN DENGAN PENCARIAN
  if (
    isset($_GET['angkatan']) &&
    isset($_GET['jurusan']) &&
    isset($_GET['semester']) &&
    isset($_GET['cariNilai'])
  ) {
    if ($_GET['semester'] == '1') {
      $bulanPertama = '07';
      $bulanAkhir = '12';
      $tahunSemester1 = explode('-', $tahunAjaran)[0];
      $semester1Awal = $tahunSemester1 . '-' . $bulanPertama . '-01';
      $semester1Akhir = $tahunSemester1 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND 
      kelas.angkatan = '$_GET[angkatan]' AND
      kelas.kode_jurusan = '$_GET[jurusan]' AND
      nilai.tanggal BETWEEN '$semester1Awal' AND '$semester1Akhir' AND
      ( siswa.nis LIKE '%$_GET[cariNilai]%' OR siswa.nama LIKE '%$_GET[cariNilai]%' )";
    }
    if ($_GET['semester'] == '2') {
      $tahunSemester2 = explode('-', $tahunAjaran)[1];
      $bulanPertama = '01';
      $bulanAkhir = '06';
      $semester2Awal = $tahunSemester2 . '-' . $bulanPertama . '-01';
      $semester2Akhir = $tahunSemester2 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND 
      kelas.angkatan = '$_GET[angkatan]' AND
      kelas.kode_jurusan = '$_GET[jurusan]' AND
      nilai.tanggal BETWEEN '$semester2Awal' AND '$semester2Akhir' AND 
      ( siswa.nis LIKE '%$_GET[cariNilai]%' OR siswa.nama LIKE '%$_GET[cariNilai]%' )";
    }
  }
  // !SECTION PENGKATEGORIAN DENGAN PENCARIAN

  // SECTION PENCARIAN TANPA PENGKATEGORIAN
  if (
    !isset($_GET['angkatan']) &&
    !isset($_GET['jurusan']) &&
    !isset($_GET['semester']) &&
    isset($_GET['cariNilai'])
  ) {
    $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND
      ( siswa.nis LIKE '%$_GET[cariNilai]%' OR siswa.nama LIKE '%$_GET[cariNilai]%' )";
  }
  // !SECTION PENCARIAN TANPA PENGKATEGORIAN

  // SECTION SORT BY ASC DENGAN PENGKATEGORIAN
  if (
    isset($_GET['angkatan']) &&
    isset($_GET['jurusan']) &&
    isset($_GET['semester']) &&
    isset($_GET['asc'])
  ) {
    if ($_GET['semester'] == '1') {
      $bulanPertama = '07';
      $bulanAkhir = '12';
      $tahunSemester1 = explode('-', $tahunAjaran)[0];
      $semester1Awal = $tahunSemester1 . '-' . $bulanPertama . '-01';
      $semester1Akhir = $tahunSemester1 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND 
      kelas.angkatan = '$_GET[angkatan]' AND
      kelas.kode_jurusan = '$_GET[jurusan]' AND
      nilai.tanggal BETWEEN '$semester1Awal' AND '$semester1Akhir' 
      ORDER BY siswa.nis ASC";
    }
    if ($_GET['semester'] == '2') {
      $tahunSemester2 = explode('-', $tahunAjaran)[1];
      $bulanPertama = '01';
      $bulanAkhir = '06';
      $semester2Awal = $tahunSemester2 . '-' . $bulanPertama . '-01';
      $semester2Akhir = $tahunSemester2 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND 
      kelas.angkatan = '$_GET[angkatan]' AND
      kelas.kode_jurusan = '$_GET[jurusan]' AND
      nilai.tanggal BETWEEN '$semester2Awal' AND '$semester2Akhir'
      ORDER BY siswa.nis ASC";
    }
  }
  // !SECTION SORT BY ASC DENGAN PENGKATEGORIAN

  // SECTION SORT BY ASC DENGAN PENGKATEGORIAN
  if (
    !isset($_GET['angkatan']) &&
    !isset($_GET['jurusan']) &&
    isset($_GET['semester']) &&
    isset($_GET['asc'])
  ) {
    if ($_GET['semester'] == '1') {
      $bulanPertama = '07';
      $bulanAkhir = '12';
      $tahunSemester1 = explode('-', $tahunAjaran)[0];
      $semester1Awal = $tahunSemester1 . '-' . $bulanPertama . '-01';
      $semester1Akhir = $tahunSemester1 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND 
      kelas.angkatan = '$_GET[angkatan]' AND
      kelas.kode_jurusan = '$_GET[jurusan]' AND
      nilai.tanggal BETWEEN '$semester1Awal' AND '$semester1Akhir'";
    }
    if ($_GET['semester'] == '2') {
      $tahunSemester2 = explode('-', $tahunAjaran)[1];
      $bulanPertama = '01';
      $bulanAkhir = '06';
      $semester2Awal = $tahunSemester2 . '-' . $bulanPertama . '-01';
      $semester2Akhir = $tahunSemester2 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND 
      kelas.angkatan = '$_GET[angkatan]' AND
      kelas.kode_jurusan = '$_GET[jurusan]' AND
      nilai.tanggal BETWEEN '$semester2Awal' AND '$semester2Akhir'";
    }
  }
  // !SECTION SORT BY ASC DENGAN PENGKATEGORIAN

  // SECTION SORT BY ASC
  if (
    !isset($_GET['angkatan']) &&
    !isset($_GET['jurusan']) &&
    !isset($_GET['semester']) &&
    isset($_GET['asc'])
  ) {
    $bulanPertama = '07';
    $bulanAkhir = '12';
    $tahunSemester1 = explode('-', $tahunAjaran)[0];
    $semester1Awal = $tahunSemester1 . '-' . $bulanPertama . '-01';
    $semester1Akhir = $tahunSemester1 . '-' . $bulanAkhir . '-30';
    $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru 
      ORDER BY siswa.nis ASC";
  }
  // !SECTION SORT BY ASC

  // SECTION SORT BY DESC DENGAN PENGKATEGORIAN
  if (
    isset($_GET['angkatan']) &&
    isset($_GET['jurusan']) &&
    isset($_GET['semester']) &&
    isset($_GET['desc'])
  ) {
    if ($_GET['semester'] == '1') {
      $bulanPertama = '07';
      $bulanAkhir = '12';
      $tahunSemester1 = explode('-', $tahunAjaran)[0];
      $semester1Awal = $tahunSemester1 . '-' . $bulanPertama . '-01';
      $semester1Akhir = $tahunSemester1 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND 
      kelas.angkatan = '$_GET[angkatan]' AND
      kelas.kode_jurusan = '$_GET[jurusan]' AND
      nilai.tanggal BETWEEN '$semester1Awal' AND '$semester1Akhir' 
      ORDER BY siswa.nis desc";
    }
    if ($_GET['semester'] == '2') {
      $tahunSemester2 = explode('-', $tahunAjaran)[1];
      $bulanPertama = '01';
      $bulanAkhir = '06';
      $semester2Awal = $tahunSemester2 . '-' . $bulanPertama . '-01';
      $semester2Akhir = $tahunSemester2 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru AND 
      kelas.angkatan = '$_GET[angkatan]' AND
      kelas.kode_jurusan = '$_GET[jurusan]' AND
      nilai.tanggal BETWEEN '$semester2Awal' AND '$semester2Akhir'
      ORDER BY siswa.nis desc";
    }
  }
  // !SECTION SORT BY DESC DENGAN PENGKATEGORIAN

  // SECTION SORT BY DESC
  if (
    !isset($_GET['angkatan']) &&
    !isset($_GET['jurusan']) &&
    !isset($_GET['semester']) &&
    isset($_GET['desc'])
  ) {
    $sqlReadNilai = "SELECT *,
      siswa.nama AS nama_s, siswa.alamat AS alamat_s, siswa.jk AS jk_s,
      jurusan.nama AS nama_j,
      guru.nama AS nama_g, guru.alamat AS alamat_g,
      nilai.id AS id_nilai
      FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.id_guru = $idGuru 
      ORDER BY siswa.nis desc";
  }
  // !SECTION SORT BY DESC
}
if (isset($_SESSION['nis']) && array_slice(explode('/', $_SERVER['REQUEST_URI']), -2, 1)[0] == 'siswa') {
  $nis = $_SESSION['nis'];

  // SECTION AKSES SISWA
  if (array_slice(explode('/', $_SERVER['REQUEST_URI']), -2, 1)[0] == 'siswa') {
    $sqlReadNilai = "SELECT * FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE 
      mengajar.nis = $nis";
  }
  if (
    isset($_GET['semester'])
  ) {
    if ($_GET['semester'] == '1') {
      $bulanPertama = '07';
      $bulanAkhir = '12';
      $tahunSemester1 = explode('-', $tahunAjaran)[0];
      $semester1Awal = $tahunSemester1 . '-' . $bulanPertama . '-01';
      $semester1Akhir = $tahunSemester1 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT * FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE mengajar.nis = $nis AND
      nilai.tanggal BETWEEN '$semester1Awal' AND '$semester1Akhir'";
    }
    if ($_GET['semester'] == '2') {
      $tahunSemester2 = explode('-', $tahunAjaran)[1];
      $bulanPertama = '01';
      $bulanAkhir = '06';
      $semester2Awal = $tahunSemester2 . '-' . $bulanPertama . '-01';
      $semester2Akhir = $tahunSemester2 . '-' . $bulanAkhir . '-30';
      $sqlReadNilai = "SELECT * FROM siswa 
      INNER JOIN kelas ON siswa.id_kelas = kelas.id 
      INNER JOIN angkatan ON kelas.angkatan = angkatan.angkatan
      INNER JOIN jurusan ON kelas.kode_jurusan = jurusan.kode_jurusan
      INNER JOIN mengajar ON siswa.nis = mengajar.nis
      INNER JOIN guru ON mengajar.id_guru = guru.id
      INNER JOIN nilai ON mengajar.id = nilai.id_mengajar
      WHERE mengajar.nis = $nis AND
      nilai.tanggal BETWEEN '$semester2Awal' AND '$semester2Akhir'";
    }
  }
  // !SECTION AKSES SISWA
}
function query2($sql)
{
  global $link;
  $rows = [];
  $query = mysqli_query($link,$sql);
  while ($row = mysqli_fetch_assoc($query)) {
    $rows[] = $row;
  }
  return $rows;
}
$nilaiSiswa = query2($sqlReadNilai);
