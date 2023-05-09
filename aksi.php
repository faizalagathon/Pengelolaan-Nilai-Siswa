<?php 
// session_start();

include 'functions.php';

if(isset($_GET['paramAksi'])){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if(isset($_GET['paramAksi'])){
        $aksi = $_GET['paramAksi'];
    }
    if(isset($_GET['paramTable'])){
        $table = $_GET['paramTable'];
    }
    if(isset($_GET['paramHalaman'])){
        $halamanAsal = $_GET['paramHalaman'];
    }
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }
    if(isset($_GET['urut'])){
        $urut = $_GET['urut'];
    }
    if(isset($_GET['halamanUser'])){
        $halamanUser = $_GET['halamanUser'];
    }
}

// SECTION AMBIL DATA
// function query($query){
//     global $link;
//     $result = mysqli_query($link, $query);
//     $rows = [];
//     foreach( $result as $row ){
//         $rows[] = $row;
//     }
//     return $rows; 
// }
// !SECTION AMBIL DATA


// SECTION HAPUS
if( isset($aksi) && $aksi == "delete" ){

    $qry = "DESC $table";
    $dataTable = mysqli_query($link, $qry);
    $primaryTable = mysqli_fetch_array($dataTable);
    $query = "DELETE FROM $table WHERE $primaryTable[0] = '$id'";
    
    mysqli_query($link, $query);

    header("Location: admin/$halamanAsal?halamanUser=$halamanUser&keyword=$keyword&urut=$urut&info=berhasilTambahData");

}
// !SECTION HAPUS

// SECTION EDIT
if( isset($aksi) && $aksi == "edit" ){

    // SECTION DAFTAR GURU
    if( $table == "guru" ){
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $is_walikelas = $_POST['is_walikelas'];

        $query = "UPDATE $table SET nip='$nip', nama='$nama', jk='$jk', alamat='$alamat', is_walikelas='$is_walikelas' WHERE id='$id'";
    }
    // !SECTION DAFTAR GURU

    // SECTION DAFTAR MAPEL
    if( $table == "mapel" ){
        $namaMapel = $_POST['mapel'];

        $query = "UPDATE $table SET nama_m='$namaMapel' WHERE nama_m='$id'";
    }
    // SECTION DAFTAR MAPEL

    // SECTION DAFTAR JURUSAN
        if( $table == "kelas" ){
            $jurusan = $_POST['jurusan'];
            $angkatan = $_POST['angkatan'];

            $query = "UPDATE $table SET kode_jurusan='$jurusan', angkatan='$angkatan' WHERE id='$id' ";
        }
    // !SECTION DAFTAR JURUSAN

    mysqli_query($link, $query);

    header("Location: admin/$halamanAsal?halamanUser=$halamanUser&keyword=$keyword&urut=$urut&info=berhasilEditData");

}
// !SECTION EDIT

// SECTION ACAK PASSWORD
if( isset($aksi) && $aksi == "acakPass" ){

    if( $table == "guru" ){
        $passwordAcak = "G";
    }
    elseif( $table == "siswa" ){
        $passwordAcak = "S";
    }

    $jumlahPass = 7;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    for ($i = 0; $i < $jumlahPass; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $passwordAcak .= $characters[$index];
    } 

    mysqli_query($link, "UPDATE $table SET password='$passwordAcak' WHERE id='$id'");

    header("Location: admin/$halamanAsal?halamanUser=$halamanUser&keyword=$keyword&urut=$urut");

}
// !SECTION ACAK PASSWORD

// SECTION TAMBAH TABLE

if( isset($aksi) && $aksi == "tambah"){

    if($table == "guru"){
        // SECTION BIKIN PASSWORD ACAK
        if( $table == "guru" ){
            $passwordAcak = "G";
        }
    
        $jumlahPass = 7;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        for ($i = 0; $i < $jumlahPass; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $passwordAcak .= $characters[$index];
        } 
        // !SECTION BIKIN PASSWORD ACAK
        
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $password = $passwordAcak;
        $is_walikelas = $_POST['is_walikelas'];

        $query = "INSERT INTO $table VALUES (NULL, '$nip', '$nama', '$alamat', '$password', '$jk', '$is_walikelas')";
    }
    
    if($table == "mapel"){
        $namaMapel = $_POST['mapel'];
        $row = mysqli_query($link, "SELECT * FROM $table WHERE nama_m='$namaMapel'");
        if(mysqli_num_rows($row) == 1){
            header("Location: admin/$halamanAsal?paramStatusAksi=gagalTambahMapel");
            exit;
        }
        else{
            $query = "INSERT INTO $table VALUES ('$namaMapel')";
        }
    }

    if($table == "kelas"){
        $jurusan = $_POST['jurusan'];
        $angkatan = $_POST['angkatan'];

        $awalKalimat = $jurusan;

        $jurusan = preg_replace("/dan/", "", $jurusan);

        for($i=0; $i<10; $i++){
            if(strpos($jurusan, "$i")){
                $jumlahJurusan = $i;
                $jurusan = preg_replace("/$i/", "", $jurusan);
            }
        }

        if(!isset($jumlahJurusan)){
            $jumlahJurusan = 1;
        }

        $kumpulanKalimat = explode(' ', $jurusan);
        $jumlahKalimat = count($kumpulanKalimat);

        for($j=0; $j<$jumlahKalimat ; $j++){
            $kumpulanKalimat[$j] = substr( $kumpulanKalimat[$j], 0, 1 );
        }

        $singkatan = implode("", $kumpulanKalimat);
        $singkatan .= "-" . $jumlahJurusan;

        $qry = "INSERT INTO jurusan VALUES ('$singkatan', '$awalKalimat')";
        mysqli_query($link, $qry);

        $query = "INSERT INTO $table VALUES (NULL, '$angkatan', '$singkatan')";
    }

    if($table == "mengajar"){
        if(isset($_POST['id_kelas'])){
            $id_kelas = $_POST['id_kelas'];
            $querySiswa = "SELECT * FROM siswa WHERE id_kelas='$id_kelas'";
        }

        if(isset($_POST['nis'])){
            $nis = $_POST['nis'];
            $querySiswa = "SELECT * FROM siswa WHERE nis='$nis'";
        }
        
        $id_guru = $_POST['id_guru'];
        $dataGuru = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM guru WHERE id = '$id_guru'"));

        $nama_m = $_POST['nama_m'];
        
        $dbSiswa = mysqli_query($link, $querySiswa);
        $dataSiswa = [];
        foreach( $dbSiswa as $data ){
            $dataSiswa[] = $data;
        }

        $jumlahData = count($dataSiswa);
        
        for($i=0;$i<$jumlahData;$i++){
            $nis = $dataSiswa[$i]['nis'];
            if($dataGuru['is_walikelas'] == 1){
                $queryMengajar = "INSERT INTO $table VALUES (NULL, '$id_guru', NULL, '$nis')";
            }
            else{
                $queryMengajar = "INSERT INTO $table VALUES (NULL, '$id_guru', '$nama_m', '$nis')";
            }
            
            mysqli_query($link, $queryMengajar);

            $queryDataMengajar = "SELECT * FROM $table 
                                    WHERE nis='$nis' 
                                    AND id_guru='$id_guru'
                                    AND nama_m='$nama_m'";

            $resultMengajar = mysqli_query($link, $queryDataMengajar);
            $dataMengajar = mysqli_fetch_assoc($resultMengajar);

            $idMengajar = $dataMengajar['id'];
            $tanggal = date('Y-m-d');
            
            if($dataGuru['is_walikelas'] == 0){
                $queryNilai = "INSERT INTO nilai VALUES (NULL, '$idMengajar', '$tanggal', 0, 0, 0, 0)";
    
                mysqli_query($link, $queryNilai);
            }

        }
        
        $query = "SELECT * FROM nilai";
        
    }
    
    mysqli_query($link, $query);

    header("Location: admin/$halamanAsal?info=berhasilTambahData");


}
    
// !SECTION TAMBAH TABLE

// SECTION CARI & URUT STATUS

    if(isset($aksi) && $aksi == "cari" || isset($aksi) && $aksi == "status"){
        $keyword = $_POST['keyword'];
        header("Location: admin/$halamanAsal?keyword=$keyword&urut=$aksi");
    }
    
// !SECTION CARI URUT STATUS





  











// SECTION HALAMAN DAFTAR MAPEL

if( isset($halaman) && $halaman == "daftar_mapel.php"){
    
    // SECTION DEFAULT
    
    if(!isset($aksi) || (isset($_GET['urut']) && $_GET['urut'] == "default")){
        $query = "SELECT * FROM mapel";
    }
    
    if(isset($_GET['urut']) && $_GET['urut'] == "cari"){
        $keyword = $_GET['keyword'];
        $query = "SELECT * FROM mapel WHERE nama_m LIKE '%$keyword%'";
    }
    
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }
    else{
        $keyword = "none";
    }
    if(isset($_GET['urut'])){
        $urut = $_GET['urut'];
    }
    else{
        $urut = "default";
    }
    // !SECTION DEFAULT
    
    $dataMapel = query($query);
    
}

// !SECTION HALAMAN DAFTAR MAPEL






// SECTION HALAMAN DAFTAR GURU

if( isset($halaman) && $halaman == "daftar_guru.php"){
    
    // SECTION DEFAULT
    if(!isset($_GET['urut']) || (isset($_GET['urut']) && $_GET['urut'] == "default")){
        $query = "SELECT * FROM guru ";
    }
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }
    else{
        $keyword = "none";
    }
    if(isset($_GET['urut'])){
        $urut = $_GET['urut'];
    }
    else{
        $urut = "default";
    }
// !SECTION DEFAULT

// SECTION URUT STATUS

    if(isset($_GET['urut']) && $_GET['urut'] == "status"){
            
        $keyword = $_GET['keyword'];
        $query = "SELECT * FROM guru WHERE 
                    is_walikelas LIKE '%$keyword%' ";
    }

// !SECTION URUT STATUS

// SECTION CARI
    if(isset($_GET['urut']) && $_GET['urut'] == "cari"){
        
        $keyword = $_GET['keyword'];
        $query = "SELECT * FROM guru WHERE
                    nip LIKE '%$keyword%' OR 
                    nama LIKE '%$keyword%' OR 
                    alamat LIKE '%$keyword%' OR 
                    jk LIKE '%$keyword%' ";
    }
// !SECTION CARI

    // SECTION pagination Peminjaman
    
    $dataPerhalaman = 4;
    $jumlahData =  count(query("$query"));
    
    $jumlahHalaman = ceil($jumlahData / $dataPerhalaman);
    
    $halamanAktif = isset( $_GET['halamanUser']) ? $_GET['halamanUser'] : 1;
    
    $awalData = ($dataPerhalaman * $halamanAktif) - $dataPerhalaman;
    
    // !SECTION pagination Peminjaman

    $query .= "LIMIT $awalData, $dataPerhalaman";

    $dataGuru = query($query);
    
}

// !SECTION HALAMAN DAFTAR GURU




// SECTION HALAMAN DAFTAR JURUSAN

if( isset($halaman) && $halaman == "daftar_jurusan.php"){

    if(!isset($_GET['urut']) || isset($_GET['urut']) && $_GET['urut'] == "default"){
        $query = "SELECT * FROM kelas";
    }
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
    }
    else{
        $keyword = "none";
    }
    if(isset($_GET['urut'])){
        $urut = $_GET['urut'];
    }
    else{
        $urut = "default";
    }
    
    $dataKelas = query($query);
    $dataAngkatan = query("SELECT * FROM angkatan");
    $dataJurusan = query("SELECT * FROM jurusan");
    
}

// !SECTION HALAMAN DAFTAR JURUSAN

?>