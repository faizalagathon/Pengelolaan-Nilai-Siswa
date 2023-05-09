<?php 

include '../aksi.php';

$dataJurusan = query("SELECT * FROM jurusan");
$dataAngkatan = query("SELECT * FROM angkatan");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Jurusan</title>
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
    
                    <div class="offcanvas offcanvas-end h-50" style="border-radius: 0 0 0 30%;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Admin</h5>
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
        <ul class="nav justify-content-center bg-light" style="margin-bottom: 45px;">
            <li class="nav-item">
                <a class="nav-link active fw-bold text-dark" aria-current="page" href="beranda.php">
                    <img src="../icon/lease.png" class="ms-2" width="40rem" alt=""><br>
                    Beranda
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link fw-bold text-dark" href="tambah_guru.php">
                    <img src="../icon/add-user.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Guru
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-dark" href="tambah_mapel.php">
                    <img src="../icon/lesson.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Mapel
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../icon/presentation.png" class="ms-5" width="40rem" alt=""><br>
                    Tambah Jurusan
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tambah_jurusan.php">Tambah Jurusan Baru</a></li>
                    <li class=""><a class="dropdown-item" href="tambah_jurusan_ada.php" class="text-decoration-underline">Jurusan Yang Sudah Ada</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../icon/presentation.png" class="ms-5" width="40rem" alt=""><br>
                    Tambah Mengajar
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tambah_mengajar_nilai.php">Tambah Kelas</a></li>
                    <li class=""><a class="dropdown-item" href="tambah_mengajar_nilai_siswa.php" class="text-decoration-underline">Tambah Siswa</a></li>
                </ul>
            </li>
        </ul>
        <div class="container-fluid mt-4">
            <div class="p-3">
                <div class="bg-secondary p-3 mt-3 w-50 m-auto" style="box-shadow: 10px 10px 0px rgb(232, 232, 232);">
                    <form action="../aksi.php?paramTable=kelas&paramAksi=tambah&paramHalaman=daftar_jurusan.php" method="post">
                        <div class="mb-3">
                            <h3 class="text-white">Tambah Jurusan</h3>
                        </div>
                        <div class="">
                            <div class="mb-3">
                                <label for="jurusan" class="form-label text-white">Jurusan :</label>
                                <input type="text" name="jurusan" class="form-control" id="jurusan">
                            </div>
                            <div class="mb-3">
                                <label for="kelas" class="form-label text-white">Angkatan :</label>
                                <select class="form-select" aria-label="Default select example" name="angkatan">
                                    <option selected>Pilih Angkatan</option>
                                    <?php foreach($dataAngkatan as $data2) : ?>
                                        <option value="<?= $data2['angkatan'] ?>"><?= $data2['angkatan'] ?></option>
                                    <?php endforeach ; ?>
                                </select>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-warning">
                                <img src="../icon/cancel.png" width="20rem" alt="">
                                Batal
                            </button>
                            <button class="btn btn-info">
                                <img src="../icon/add.png" width="20rem" alt="">
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>