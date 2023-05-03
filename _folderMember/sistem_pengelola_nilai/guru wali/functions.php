<?php 
$conn=mysqli_connect("localhost","root","","bindo_nilai_siswa_v3");

function query($query){
    global $conn;
    $result=mysqli_query($conn, $query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nis= htmlspecialchars($data["nis"]); 
    $jk=htmlspecialchars($data["jk"]);
    $nama= htmlspecialchars ($data["nama"]);
    $alamat=htmlspecialchars($data["alamat"]);
    $angkatan=htmlspecialchars($data["angkatan"]);
    $jurusan=htmlspecialchars($data["kode_jurusan"]);
   
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


    $query="INSERT INTO siswa
                VALUES
            ('','$nis','$jk','$nama','$alamat','$passwordAcak','$angkatan','$jurusan')";
    
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}



        //Acak Password
        if(isset($_GET['paramAksi']) && $_GET['paramAksi'] == "acakPass" ){
            $passwordAcak = "S";
            $id = $_GET['id'];
            $jumlahPass = 7;
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

            for ($i = 0; $i < $jumlahPass; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $passwordAcak .= $characters[$index];
            } 

            $query = "UPDATE siswa SET password='$passwordAcak' WHERE id='$id'";
            mysqli_query($conn, $query);

            header("Location: beranda.php");
            
        }
        //Akhir Acak Password


function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM siswa where id=$id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    $id=($data["id"]);
    $nis= htmlspecialchars ($data["nis"]);
    $nama=htmlspecialchars($data["nama"]);
    $jk=htmlspecialchars($data["jk"]);
    $alamat=htmlspecialchars($data["alamat"]);



$query="UPDATE siswa SET 
            nis = '$nis',
            nama = '$nama',
            jk = '$jk',
            alamat = '$alamat'
           
            WHERE id=$id
            ";

mysqli_query($conn,$query);

return mysqli_affected_rows($conn);

}

function cari($keyword){
    $query = "SELECT * FROM siswa
                WHERE 
              nis LIKE '%$keyword%' OR
              nama LIKE '%$keyword%' OR
              jk LIKE '%$keyword%' OR
              alamat LIKE '%$keyword%'
              ";

    return query($query);
}
?>
