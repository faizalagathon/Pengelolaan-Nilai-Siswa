<?php 
require 'functions.php';


// TAMBAH


if (isset($_POST["submit"])){

    if(tambah($_POST) > 0){
        echo "
        
        <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'beranda.php';
        </script>
        
        ";
    }else{
        echo "
        <script>
        alert('data gagal ditambahkan');
        document.location.href = 'beranda.php';
        </script>
        ";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body{
            background: url(../../bg/bg6.jpg);
            background-size: cover;
            background-attachment: fixed;
        }
    </style>
  </head>
  <body>

    <div class="">
        <!-- HEADER -->
        <nav class="navbar bg-dark judul">
            <div class="container">
                <a class="navbar-brand fw-bold fs-4 text-white" href="#">
                    <img src="../icon/SMKN-1-Cirebon.png" alt="" class="bg-white p-1 rounded-4" width="80" height="80">
                    Pengelola Data Nilai
                </a>
                <div class="d-flex text-center">
                    <button class="border-0 bg-white fw-bold rounded-pill" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <img src="../icon/profile.png" width="40rem" alt="" class="bg-light rounded-circle p-0 py-1 pe-1">Profile
                    </button>
    
                    <div class="offcanvas offcanvas-end h-50" style="border-radius: 0px 0px 0px 20%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Wali Kelas XI RPL 2</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <img src="../icon/profile.png" width="100rem" alt="" class="mb-3">
                            <p>Muhammad Azis Nurfajari</p>
                            <div class="footer">
                                <button class="border-0 bg-white fw-bold">
                                    <img src="../icon/logout.png" width="30rem" alt="">Logout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- AKHIR HEADER -->
        <!-- MENU -->
        <ul class="nav justify-content-center bg-light">
            <li class="nav-item">
                <a class="nav-link active fw-bold text-dark" aria-current="page" href="beranda.php">
                    <img src="../icon/reader.png" class="ms-4" width="40rem" alt=""><br>
                    Daftar Murid
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-decoration-underline text-dark" href="tambah_murid.php">
                    <img src="../icon/add-user.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Data
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-dark" href="data_nilai.php">
                    <img src="../icon/score.png" class="ms-5" width="40rem" alt=""><br>
                    Data Nilai Murid
                </a>
            </li>
        </ul>
        <!-- AKHIR MENU -->






        <!-- FORM TAMBAH AKUN DAN MURID -->
        <div class="container-fluid">
            <form action="" method="POST" class="w-50 m-auto">
                <div class="bg-secondary m-3 p-3 border border-3 border-white rounded-4">
                    <div class="">
                        <div class="mb-3">
                            <h3 class="text-white">Tambah Data Murid</h3>
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label text-white">NIS :</label>
                            <input type="text" name="nis" id="nis" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label text-white">Nama :</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                        <div class="d-flex gap-3">
                            <div class="mb-3 w-25">
                                <label for="jk" class="form-label text-white">JK :</label>
                                <select class="form-select" id="jk" name="jk" type="text" aria-label="Default select example">
                                    <option selected>Jenis Kelamin</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>                           
                            
                           <div class="mb-3 w-25">
                                <label for="angkatan" class="form-label text-white">Angkatan :</label>
                                <select class="form-select" id="angkatan" name="angkatan" type="text" aria-label="Default select example">
                                    <option selected>Angkatan </option>
                                    <option value="2">X</option>
                                    <option value="2"> XI</option>
                                    <option value="4">XII</option>
                                    
                                </select>
                            </div>
                            
                            <div class="mb-3 w-25">
                                <label for="jurusan" class="form-label text-white">Jurusan :</label>
                                <select class="form-select" id="jurusan" name="kode_jurusan" type="text" aria-label="Default select example">
                                    <option selected>Jurusan </option>
                                    <option value="RPL-1">Rekayasa Perangkat Lunak 1</option>
                                </select>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label text-white">Alamat :</label>
                            <textarea class="form-control" name="alamat" id="alamat" type="text" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-warning">
                            <img src="../icon/cancel.png" width="20rem" alt="">
                            Batal
                        </button>
                        <button class="btn btn-info" name="submit" type="submit">
                            <img src="../icon/add.png" width="20rem" alt="">
                            Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM TAMBAH AKUN DAN MURID -->








        <!-- FOOTER -->
        <div class="bg-dark mt-5 p-1 pt-2 w-100" id="footer" style="margin-bottom: -2rem;">
            <footer class="main-footer mt-3" style="padding-top: 10px;">
                <div class="text-center">
                    <a href="http://smkn1-cirebon.sch.id" class="txt2 hov1 text-decoration-none text-white nav-link disabled" target="_blank">
                        © 2022 SMK Negeri 1 Cirebon
                    </a>
                </div>
            </footer>
        
            <p class="text-center text-white"><small>- Support By XI RPL 2 -</small></p>
        </div>
        <!--AKHIR FOOTER -->
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>