<?php
require 'functions.php';
if(isset($_GET["ParamAksi"])){
    $aksi=$_GET["ParamAksi"];
    $table=$_GET['ParamTable'];
    $cek = $_GET['ParamCek'];
    $error=$_GET['ParamError'];
    $halaman=$_GET['ParamHalaman'];

}
//SECTION aksi login
if($aksi=="login_admin"||"login_siswa"||"login_wali"||"login_mapel"){
    $password=htmlspecialchars($_POST["password"]);
        
        if($table=="admin"){
            $nama=htmlspecialchars($_POST["nama"]);
            $result = mysqli_query($link, "SELECT * FROM $table WHERE nama='$nama' AND password='$password'");
        }
       
        if($table=="siswa"){
            $nis=htmlspecialchars($_POST["nis"]);

            $result = mysqli_query($link, "SELECT * FROM $table WHERE nis='$nis' AND password='$password'");
        }
      
        if($table=="guru"){
        $nip=htmlspecialchars($_POST["nip"]);

        $result = mysqli_query($link, "SELECT * FROM $table WHERE nip='$nip' AND password='$password'");
        }

        
        if($cek=="cekpass"){
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                
            if($table=="admin"){
                if($row['nama']==$nama && $row ['password']==$password){
                    $_SESSION['login_admin'] = true;
                    header("Location: admin/beranda.php");
                    exit;
                }
            }
            
            if($table=="siswa"){
                if($row['nis']==$nis && $row ['password']==$password){
                    $_SESSION['login_siswa'] = true;
                    $_SESSION['nis'] = $nis;
                    header("Location: siswa/beranda.php");
                    exit;
                }
            }

            if($table=="guru"){
                if($row['nip']==$nip && $row ['password']==$password){
                    $_SESSION['nip'] = $nip;
                    if($halaman=='login_wali'){
                        $_SESSION['login_wali'] = true;
                        header("Location: guru_wali/beranda.php");
                        exit;
                    }
                    if($halaman=='login_mapel'){
                        $_SESSION['login_mapel'] = true;
                        header("Location: guru_mapel/beranda.php");
                        exit;
                    }
                    
                }    
            }
        }    

        //SECTION error
        if($error=="login_admin"){
        header("Location: admin/login_admin.php?coba=gagal");
        exit;
        }
        if($error=="login_siswa"){
        header("Location: siswa/login_murid.php?coba=gagal");
        exit;
        }
        if($error=="login_mapel"){
        header("Location: guru_mapel/login_mapel.php?coba=gagal");
        exit;
        }
        if($error=="login_wali"){
        header("Location: guru_wali/login_wali.php?coba=gagal");
        exit;
        }
        //!SECTION end error

        if($error==""){
            
        }
        
    }
}
?>