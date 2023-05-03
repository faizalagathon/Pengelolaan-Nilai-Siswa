<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style_beranda.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        .card-body{
            backdrop-filter: blur(15px);
        }
        .card img{
            transition: ease-in-out;
            transition: 5s;
        }
        .card img:hover{
            transform: rotatey(360deg);
            transition: 5s;
        }
    </style>
  </head>
  <body>
<!-- SECTION - ini dicopy ke semua untuk sesi -->
<?php
    session_start();
    if (!isset($_SESSION["login_admin"])){
        header("Location: login_admin.php");
        exit;        
    }
    ?>
    <!-- !SECTION -  -->
        <!-- SECTION HEADER -->
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
        <!-- !SECTION AKHIR HEADER -->
        <!-- SECTION MENU -->
        <ul class="nav justify-content-center bg-light">
            <li class="nav-item">
                <a class="nav-link active fw-bold text-dark text-decoration-underline" aria-current="page" href="beranda.html">
                    <img src="../icon/lease.png" class="ms-2" width="40rem" alt=""><br>
                    Beranda
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../icon/add-user.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Guru
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tambah_guru_wali.html">Wali Kelas</a></li>
                    <li><a class="dropdown-item" href="tambah_guru_mapel.html">Guru Mapel</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-dark" href="tambah_mapel.html">
                    <img src="../icon/lesson.png" class="ms-4" width="40rem" alt=""><br>
                    Tambah Mapel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold text-dark" href="tambah_jurusan.html">
                    <img src="../icon/presentation.png" class="ms-5" width="40rem" alt=""><br>
                    Tambah Jurusan
                </a>
            </li>
        </ul>
        <!-- !SECTION AKHIR MENU -->
        <!-- SECTION CARD -->
        <div class="container-fluid">
            <div class="row container-fluid mt-3">
                <div class="col">
                    <div class="card m-auto bg-transparent border-2 border-white rounded rounded-4" style="width: 18rem;">
                        <img src="../icon/teacher3.png" class="card-img-top bg-light rounded-3 rounded-bottom" alt="...">
                        <div class="card-body text-center rounded-4 rounded-top text-white">
                            <h3>Daftar Guru</h3>
                            <a href="daftar_guru.html">
                                <button class="btn btn-primary w-100">Lihat</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card m-auto bg-transparent border-2 border-white rounded rounded-4" style="width: 18rem;">
                        <img src="../icon/lesson2.png" class="card-img-top bg-light rounded-3 rounded-bottom" alt="...">
                        <div class="card-body text-center rounded-4 rounded-top text-white">
                            <h3>Daftar Mapel</h3>
                            <a href="daftar_mapel.html">
                                <button class="btn btn-primary w-100">Lihat</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card m-auto bg-transparent border-2 border-white rounded rounded-4" style="width: 18rem;">
                        <img src="../icon/approved.png" class="card-img-top bg-light rounded-3 rounded-bottom" alt="...">
                        <div class="card-body text-center rounded-4 rounded-top text-white">
                            <h3>Daftar Jurusan</h3>
                            <a href="daftar_jurusan.html">
                                <button class="btn btn-primary w-100">Lihat</button>
                            </a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <!-- !SECTION AKHIR CARD -->
        <!-- SECTION FOOTER -->
        <div class="bg-dark mt-3 p-1 pt-2 w-100" id="footer" style="margin-bottom: -2rem;">
            <footer class="main-footer mt-3" style="padding-top: 10px;">
                <div class="text-center">
                    <a href="http://smkn1-cirebon.sch.id" class="txt2 hov1 text-decoration-none text-white nav-link disabled" target="_blank">
                        © 2022 SMK Negeri 1 Cirebon
                    </a>
                </div>
            </footer>
        
            <p class="text-center text-white"><small>- Support By XI RPL 2 -</small></p>
        </div>
        <!-- !SECTION AKHIR FOOTER -->
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>